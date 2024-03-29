<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Cartarecomendacion;
use App\Models\AutoridadAcademica;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Estudiante;
use App\Models\Facultad;
use Livewire\WithFileUploads;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Adapter\PDFLib;
use Illuminate\Support\Facades\Abort;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\UploadedFile;
use DB;


class Cartarecomendacions extends Component
{
    use WithPagination;
	use WithFileUploads;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $cartaId, $fechaCarta, $cargoYTareasRealizadas, $telefonoAutoridad, $firmaAutoridad, $autoridadAcademica_id, $estudiante_id;
	protected $cartaEncontrada = false;
	public $newFirma;
    

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
		$userID = Auth::id();
		$facultades = Facultad::all();
	
		$autoridadesacademicas = AutoridadAcademica::where('user_id', $userID)->get();
		$estudiantes = Estudiante::join('carreras', 'carreras.id', '=', 'estudiantes.carrera_id')
								->join('facultads', 'facultads.id', '=', 'carreras.facultad_id')
								->join('autoridadacademicas', 'facultads.id', '=', 'autoridadacademicas.facultad_id')
								->where('autoridadacademicas.user_id', $userID)
								->get();
								$ccartarecomendacions = Cartarecomendacion::latest()
								->orWhere('cartaId', 'LIKE', $keyWord)
								->orWhere('fechaCarta', 'LIKE', $keyWord)
								->orWhere('cargoYTareasRealizadas', 'LIKE', $keyWord)
								->orWhere('telefonoAutoridad', 'LIKE', $keyWord)
								->orWhere('firmaAutoridad', 'LIKE', $keyWord)
								->orWhereHas('AutoridadAcademica', function ($query) use ($keyWord) {
									$query->where('nombreAutoridad', 'LIKE', $keyWord);
								})
								->orWhereHas('Estudiante', function ($query) use ($keyWord) {
									$query->where('nombre', 'LIKE', $keyWord);
								})
								->paginate(10);
						$cartaEncontrada = false; 

						foreach ($ccartarecomendacions as $item) {
							if ($item->estudiante->user_id == $userID) {
								$cartaEncontrada = true;
								break;
							}
						}
						if (!$cartaEncontrada) {
							session()->flash('message', 'No existe Carta');
						}

						return view('livewire.cartarecomendacions.view', [
							'cartarecomendacions' => $ccartarecomendacions,
							'autoridadesacademicas' => $autoridadesacademicas,
							'estudiantes' => $estudiantes,
							'cartaEncontrada' => $cartaEncontrada,
						]);
    }
	public function updatingKeyWord(){
        $this->resetPage();
    }

	/*genera la  carta en pdf*/
	public function downloadPDF()
	{
		$usuario=auth()->user()->id;
		//$ccartarecomendacions=Cartarecomendacion::where('estudiante_id',$usuario);
		$ccartarecomendacions=Cartarecomendacion::all();
		$facultades=Facultad::all();
		
		
		
		$pdf=Pdf::loadView('livewire.cartarecomendacions.viewpdf',compact('ccartarecomendacions','usuario'));
		return $pdf->stream('carta.pdf');

	}

    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		
		$this->fechaCarta = null;
		$this->cargoYTareasRealizadas = null;
		$this->telefonoAutoridad = null;
		$this->firmaAutoridad = null;
		$this->autoridadAcademica_id = null;
		$this->estudiante_id = null;
    }
	protected $rules = [
		'fechaCarta' => 'required',
		'cargoYTareasRealizadas' => 'required|regex:/^[\pL\s\-]+$/u',
		'telefonoAutoridad' => 'required|size:8',
		'firmaAutoridad' => 'required|mimes:jpeg,png,jpg,gif',
		'autoridadAcademica_id' => 'required',
		'estudiante_id' => 'required',

	];

	public function updated($propertyCartarecomendacion){
		$this->validateOnly($propertyCartarecomendacion);
	  }

    public function store()
    {
        $this->validate();

		if ($this->firmaAutoridad!=null) {
			$this->newFirma = uniqid() . '.' . $this->firmaAutoridad->getClientOriginalExtension();
			$this->firmaAutoridad->storeAs('public/firmas', $this->newFirma, 'local');
		}

        Cartarecomendacion::create([ 
			
			'fechaCarta' => $this-> fechaCarta,
			'cargoYTareasRealizadas' => $this-> cargoYTareasRealizadas,
			'telefonoAutoridad' => $this-> telefonoAutoridad,
			//'storage/' . $this-> firma ->store('firmas','public'),
			'firmaAutoridad' => $this->newFirma,
			'autoridadAcademica_id' => $this-> autoridadAcademica_id,
			'estudiante_id' => $this-> estudiante_id
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Carta de recomendacion');
    }

    public function edit($cartaId)
    {
        $record = Cartarecomendacion::findOrFail($cartaId);
        $this->selected_id = $cartaId; 
		
		$this->fechaCarta = $record-> fechaCarta;
		$this->cargoYTareasRealizadas = $record-> cargoYTareasRealizadas;
		$this->telefonoAutoridad = $record-> telefonoAutoridad;
		$this->firmaAutoridad = $record-> firmaAutoridad;
		$this->autoridadAcademica_id = $record-> autoridadAcademica_id;
		$this->estudiante_id = $record-> estudiante_id;
    }

    public function update()
    {
        $this->validate([
		
		'fechaCarta' => 'required',
		'cargoYTareasRealizadas' => 'required',
		'telefonoAutoridad' => 'required|numeric',
		
		'autoridadAcademica_id' => 'required',
		'estudiante_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Cartarecomendacion::find($this->selected_id);
            $record->update([ 
		
			'fechaCarta' => $this-> fechaCarta,
			'cargoYTareasRealizadas' => $this-> cargoYTareasRealizadas,
			'telefonoAutoridad' => $this-> telefonoAutoridad,
			
			'autoridadAcademica_id' => $this-> autoridadAcademica_id,
			'estudiante_id' => $this-> estudiante_id
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Carta recomendacion Actualizada');
        }
    }
/*edita la firma*/
	public function editfirm($cartaId)
	{
		$recordfirm = Cartarecomendacion::findOrFail($cartaId);
		$this->selected_id = $cartaId; 
		$this->firmaAutoridad = $recordfirm-> firmaAutoriad;
	 
	}
	public function firma(){
		if ($this->selected_id) {
			$recordfirm = Cartarecomendacion::find($this->selected_id);
 
			$recordfirm->update([ 
			
			'firmaAutoridad' => 'storage/' . $this-> firmaAutoridad->store('firmas','public'),
				  
			]);
 
			$this->resetInput();
			$this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Firma actualizada Exitosamente!.');
		}
	}

	


}
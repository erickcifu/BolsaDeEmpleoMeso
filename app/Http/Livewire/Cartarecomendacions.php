<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Cartarecomendacion;
use App\Models\Autoridadacademica;
use App\Models\Estudiante;
use Livewire\WithFileUploads;

class Cartarecomendacions extends Component
{
    use WithPagination;
	use WithFileUploads;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $cartaId, $fechaCarta, $cargoYTareasRealizadas, $telefonoAutoridad, $firmaAutoridad, $autoridadAcademica_id, $estudiante_id;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.cartarecomendacions.view', [
            'cartarecomendacions' => Cartarecomendacion::latest()
						->orWhere('cartaId', 'LIKE', $keyWord)
						->orWhere('fechaCarta', 'LIKE', $keyWord)
						->orWhere('cargoYTareasRealizadas', 'LIKE', $keyWord)
						->orWhere('telefonoAutoridad', 'LIKE', $keyWord)
						->orWhere('firmaAutoridad', 'LIKE', $keyWord)
						->orWhere('autoridadAcademica_id', 'LIKE', $keyWord)
						->orWhere('estudiante_id', 'LIKE', $keyWord)
						->paginate(10),
						'autoridadesacademicas'=>Autoridadacademica::all(),
						'estudiantes'=>Estudiante::all()
        ]);
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
		'telefonoAutoridad' => 'required|numeric',
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

        Cartarecomendacion::create([ 
			
			'fechaCarta' => $this-> fechaCarta,
			'cargoYTareasRealizadas' => $this-> cargoYTareasRealizadas,
			'telefonoAutoridad' => $this-> telefonoAutoridad,
			//'storage/' . $this-> firma ->store('firmas','public'),
			'firmaAutoridad' => 'storage/' . $this-> firmaAutoridad->store('firmas','public'),
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
		'firmaAutoridad' => 'required|mimes:jpeg,png,jpg,gif',
		'autoridadAcademica_id' => 'required',
		'estudiante_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Cartarecomendacion::find($this->selected_id);
            $record->update([ 
		
			'fechaCarta' => $this-> fechaCarta,
			'cargoYTareasRealizadas' => $this-> cargoYTareasRealizadas,
			'telefonoAutoridad' => $this-> telefonoAutoridad,
			'firmaAutoridad' => 'storage/' . $this-> firmaAutoridad->store('firmas','public'),
			'autoridadAcademica_id' => $this-> autoridadAcademica_id,
			'estudiante_id' => $this-> estudiante_id
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Carta recomendacion Actualizada');
        }
    }

	public function eliminar($cartaId)
	{
		$this->selected_id = $cartaId;
		$this->dispatchBrowserEvent('showDeleteConfirmationModal');
	}

    public function destroy()
    {
        if ($this->selected_id) {
			Cartarecomendacion::where('cartaId', $this->selected_id)->delete();
		}
	
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'carta Eliminada');
    }
}
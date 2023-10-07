<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Oferta;
use App\Models\Postulacion;
use Livewire\WithFileUploads;
use Carbon\Carbon;


class OfertasEstudiantes extends Component
{
    use WithPagination;
	use WithFileUploads;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $descripcion, $puesto, $imagen, $sueldoMinimo, $fecha, $puestoVacante, $tipoContratacion, $edadRequerida, $genero, $perfil, $sueldoMax, $empresa_id;
	public $fechaPostulacion, $oferta_id;

    public function mount()
    {
        $this->fechaPostulacion = Carbon::now()->toDate()->format('Y-m-d');
		
    }

    public function render()
    {
        $this->Postulaciones = Postulacion::all();

        $keyWord = '%'.$this->keyWord .'%';
        return view('livewire.ofertasestudiantes.ofertas-estudiantes', [
            'ofertasestudiantes' => Oferta::latest()
						->orWhere('descripcion', 'LIKE', $keyWord)
						->orWhere('puesto', 'LIKE', $keyWord)
						->orWhere('imagen', 'LIKE', $keyWord)
						->orWhere('sueldoMinimo', 'LIKE', $keyWord)
						->orWhere('fecha', 'LIKE', $keyWord)
						->orWhere('puestoVacante', 'LIKE', $keyWord)
						->orWhere('tipoContratacion', 'LIKE', $keyWord)
						->orWhere('edadRequerida', 'LIKE', $keyWord)
						->orWhere('genero', 'LIKE', $keyWord)
						->orWhere('perfil', 'LIKE', $keyWord)
						->orWhere('sueldoMax', 'LIKE', $keyWord)
						->orWhere('empresa_id', 'LIKE', $keyWord)
						->paginate(2),
        ]);
    }

    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->descripcion = null;
		$this->puesto = null;
		$this->imagen = null;
		$this->sueldoMinimo = null;
		$this->fecha = null;
		$this->puestoVacante = null;
		$this->tipoContratacion = null;
		$this->edadRequerida = null;
		$this->genero = null;
		$this->perfil = null;
		$this->sueldoMax = null;
		$this->empresa_id = null;
    }

    public function store()
    {
        $this->validate([
		'descripcion' => 'required',
		'puesto' => 'required',
		'imagen' => 'image',
		'sueldoMinimo' => 'required | numeric',
		'fecha' => 'required',
		'puestoVacante' => 'required',
		'tipoContratacion' => 'required',
		'edadRequerida' => 'required',
		'genero' => 'required',
		'perfil' => 'required',
		'sueldoMax' => 'required | numeric',
        ]);

        Oferta::create([ 
			'descripcion' => $this-> descripcion,
			'puesto' => $this-> puesto,
			'imagen' => $this-> imagen,
			'sueldoMinimo' => $this-> sueldoMinimo,
			'fecha' => $this-> fecha,
			'puestoVacante' => $this-> puestoVacante,
			'tipoContratacion' => $this-> tipoContratacion,
			'edadRequerida' => $this-> edadRequerida,
			'genero' => $this-> genero,
			'perfil' => $this-> perfil,
			'sueldoMax' => $this-> sueldoMax,
			'empresa_id' => $this-> empresa_id
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Oferta creada correctamente!');
    }

	public function mostrarOferta($id)
    {
        $record = Oferta::findOrFail($id);
        $this->selected_id = $id; 
		$this->descripcion = $record-> descripcion;
		$this->puesto = $record-> puesto;
		$this->imagen = $record-> imagen;
		$this->sueldoMinimo = $record-> sueldoMinimo;
		$this->fecha = $record-> fecha;
		$this->puestoVacante = $record-> puestoVacante;
		$this->tipoContratacion = $record-> tipoContratacion;
		$this->edadRequerida = $record-> edadRequerida;
		$this->genero = $record-> genero;
		$this->perfil = $record-> perfil;
		$this->sueldoMax = $record-> sueldoMax;
		$this->empresa_id = $record-> empresa_id;
    }

    public function edit($id)
    {
        $record = Oferta::findOrFail($id);
        $this->selected_id = $id; 
		$this->descripcion = $record-> descripcion;
		$this->puesto = $record-> puesto;
		$this->imagen = $record-> imagen;
		$this->sueldoMinimo = $record-> sueldoMinimo;
		$this->fecha = $record-> fecha;
		$this->puestoVacante = $record-> puestoVacante;
		$this->tipoContratacion = $record-> tipoContratacion;
		$this->edadRequerida = $record-> edadRequerida;
		$this->genero = $record-> genero;
		$this->perfil = $record-> perfil;
		$this->sueldoMax = $record-> sueldoMax;
		$this->empresa_id = $record-> empresa_id;
    }

    public function update()
    {
        $this->validate([
		'descripcion' => 'required',
		'puesto' => 'required',
		'imagen' => 'required',
		'sueldoMinimo' => 'required',
		'fecha' => 'required',
		'puestoVacante' => 'required',
		'tipoContratacion' => 'required',
		'edadRequerida' => 'required',
		'genero' => 'required',
		'perfil' => 'required',
		'sueldoMax' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Oferta::find($this->selected_id);
            $record->update([ 
			'descripcion' => $this-> descripcion,
			'puesto' => $this-> puesto,
			'imagen' => $this-> imagen,
			'sueldoMinimo' => $this-> sueldoMinimo,
			'fecha' => $this-> fecha,
			'puestoVacante' => $this-> puestoVacante,
			'tipoContratacion' => $this-> tipoContratacion,
			'edadRequerida' => $this-> edadRequerida,
			'genero' => $this-> genero,
			'perfil' => $this-> perfil,
			'sueldoMax' => $this-> sueldoMax,
			'empresa_id' => $this-> empresa_id
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Oferta actualizada correctamente!');
        }
    }

	//FUNCION PARA OBTNER EL ID DESDE LA TABLA OFERTA
	public function setOfertaId($id)
    {
        $this->oferta_id = $id;
    }
	
	//FUNCION PARA CREAR LA POSTULACION
	public function postular(){
        Postulacion::create([
			'fechaPostulacion' =>  $this->fechaPostulacion,
            'oferta_id' => $this-> oferta_id,
        ]);
		
		$this->dispatchBrowserEvent('closeModal');
        session()->flash('message', 'Te has postulado exitosamente a esta oferta.');
	}

    public function destroy($id)
    {
        if ($id) {
            Oferta::where('id', $id)->delete();
        }
    }
}

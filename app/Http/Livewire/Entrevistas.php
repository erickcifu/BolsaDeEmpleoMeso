<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Entrevista;
use App\Models\Oferta;

class Entrevistas extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $tituloEntrevista, $descripcionEntrevista, $FechaEntrevista, $horaInicio, $horaFinal, $Contratado, $comentarioContratado, $postulacion_id;
	public $record2;
	public $ofertaId, $ofertasEnt, $nombreOferta, $ofertapost;

	public function mount($ofertaId)
    {
        $this->ofertaId = $ofertaId;
    }
	
    public function render()
    {
		 //   Obtener la oferta con las postulaciones y entrevistas asociadas
	 	$this->ofertapost = Oferta::with('postulacions.entrevistas')->find($this->ofertaId);

	 	// Verificar si la oferta existe
	 	if (!$this->ofertapost) {
	 		session()->flash('message', 'La oferta no existe.');
	 		return;
	 	}

	 	//  Obtener el nombre de la oferta
	 	$this->nombreOferta = $this->ofertapost->nombrePuesto;

	 	//  Obtener todas las entrevistas asociadas a las postulaciones de la oferta
	 	$this->ofertasEnt = $this->ofertapost->postulacions->flatMap(function ($totalEntrevistas) {
	 		return $totalEntrevistas->entrevistas;
	 	});

		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.entrevistas.view', [
            'entrevistas' => Entrevista::latest()
						->orWhere('tituloEntrevista', 'LIKE', $keyWord)
						->orWhere('descripcionEntrevista', 'LIKE', $keyWord)
						->orWhere('FechaEntrevista', 'LIKE', $keyWord)
						->orWhere('horaInicio', 'LIKE', $keyWord)
						->orWhere('horaFinal', 'LIKE', $keyWord)
						->orWhere('Contratado', 'LIKE', $keyWord)
						->orWhere('comentarioContratado', 'LIKE', $keyWord)
						->orWhere('postulacion_id', 'LIKE', $keyWord)
						->paginate(10),
						"ofertasEnt" => $this->ofertasEnt,
        ]);
    }
	public function updatingKeyWord(){
        $this->resetPage();
    }
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->tituloEntrevista = null;
		$this->descripcionEntrevista = null;
		$this->FechaEntrevista = null;
		$this->horaInicio = null;
		$this->horaFinal = null;
		$this->Contratado = null;
		$this->comentarioContratado = null;
		$this->postulacion_id = null;
    }

    public function store()
    {
        $this->validate([
		'tituloEntrevista' => 'required',
		'descripcionEntrevista' => 'required',
		'FechaEntrevista' => 'required',
		'horaInicio' => 'required',
		'horaFinal' => 'required',
		'postulacion_id' => 'required',
        ]);

        Entrevista::create([ 
			'tituloEntrevista' => $this-> tituloEntrevista,
			'descripcionEntrevista' => $this-> descripcionEntrevista,
			'FechaEntrevista' => $this-> FechaEntrevista,
			'horaInicio' => $this-> horaInicio,
			'horaFinal' => $this-> horaFinal,
			'Contratado' => $this-> Contratado,
			'comentarioContratado' => $this-> comentarioContratado,
			'postulacion_id' => $this-> postulacion_id
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Entrevista creada exitosamente.');
    }

	public function mostrar($entrevistaId)
    {
        $record = Entrevista::findOrFail($entrevistaId);
        $this->selected_id = $entrevistaId; 
		$this->tituloEntrevista = $record-> tituloEntrevista;
		$this->descripcionEntrevista = $record-> descripcionEntrevista;
		$this->FechaEntrevista = $record-> FechaEntrevista;
		$this->horaInicio = $record-> horaInicio;
		$this->horaFinal = $record-> horaFinal;
		$this->Contratado = $record-> Contratado;
		$this->comentarioContratado = $record-> comentarioContratado;
		$this->postulacion_id = $record-> postulacion_id;
    }

    public function edit($entrevistaId)
    {
        $record = Entrevista::findOrFail($entrevistaId);
        $this->selected_id = $entrevistaId; 
		$this->tituloEntrevista = $record-> tituloEntrevista;
		$this->descripcionEntrevista = $record-> descripcionEntrevista;
		$this->FechaEntrevista = $record-> FechaEntrevista;
		$this->horaInicio = $record-> horaInicio;
		$this->horaFinal = $record-> horaFinal;
		$this->Contratado = $record-> Contratado;
		$this->comentarioContratado = $record-> comentarioContratado;
		$this->postulacion_id = $record-> postulacion_id;
    }

    public function update()
    {
        $this->validate([
		'tituloEntrevista' => 'required',
		'descripcionEntrevista' => 'required',
		'FechaEntrevista' => 'required',
		'horaInicio' => 'required',
		'horaFinal' => 'required',
		'postulacion_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Entrevista::find($this->selected_id);
            $record->update([ 
			'tituloEntrevista' => $this-> tituloEntrevista,
			'descripcionEntrevista' => $this-> descripcionEntrevista,
			'FechaEntrevista' => $this-> FechaEntrevista,
			'horaInicio' => $this-> horaInicio,
			'horaFinal' => $this-> horaFinal,
			'Contratado' => $this-> Contratado,
			'comentarioContratado' => $this-> comentarioContratado,
			'postulacion_id' => $this-> postulacion_id
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Actualizado correctamente!.');
        }
    }


	public function edit2($entrevistaId)
    {
        $record = Entrevista::findOrFail($entrevistaId);
        $this->selected_id = $entrevistaId; 
		$this->tituloEntrevista = $record-> tituloEntrevista;
		$this->descripcionEntrevista = $record-> descripcionEntrevista;
		$this->FechaEntrevista = $record-> FechaEntrevista;
		$this->horaInicio = $record-> horaInicio;
		$this->horaFinal = $record-> horaFinal;
		$this->Contratado = $record-> Contratado;
		$this->comentarioContratado = $record-> comentarioContratado;
		$this->postulacion_id = $record-> postulacion_id;
    }

    public function update2()
    {
        $this->validate([
		'tituloEntrevista' => 'required',
		'descripcionEntrevista' => 'required',
		'FechaEntrevista' => 'required',
		'horaInicio' => 'required',
		'horaFinal' => 'required',
		'postulacion_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Entrevista::find($this->selected_id);
            $record->update([ 
			'tituloEntrevista' => $this-> tituloEntrevista,
			'descripcionEntrevista' => $this-> descripcionEntrevista,
			'FechaEntrevista' => $this-> FechaEntrevista,
			'horaInicio' => $this-> horaInicio,
			'horaFinal' => $this-> horaFinal,
			'Contratado' => $this-> Contratado,
			'comentarioContratado' => $this-> comentarioContratado,
			'postulacion_id' => $this-> postulacion_id
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Actualizado correctamente!.');
        }
    }

	public function buscarId($entrevistaId)
    {
		$this->selected_id = $entrevistaId;
        $this->dispatchBrowserEvent('showEliminarDataModal');
    }

    public function destroy()
    {
		if ($this->selected_id) {
			Entrevista::where('entrevistaId', $this->selected_id)->delete();
        }
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Entrevista eliminada correctamente');
    }
}
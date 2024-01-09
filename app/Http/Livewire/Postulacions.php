<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Postulacion;
use App\Models\Entrevista;
use App\Models\Oferta;

class Postulacions extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $fechaPostulacion, $oferta_id;
    public $tituloEntrevista, $descripcionEntrevista, $FechaEntrevista, $horaInicio, $horaFinal, $Contratado, $comentarioContratado, $postulacion_id;
    public $postulaciones, $oferta;
    public $ofertaId;

    public function mount($ofertaId)
    {
        $this->ofertaId = $ofertaId;
    }

    public function render()
    {
        $keyWord = '%'.$this->keyWord .'%';
        $this->ofertapost = Oferta::with('postulacions')->find($this->ofertaId);

		// Verificar si la oferta existe
		if (!$this->ofertapost) {
			session()->flash('message', 'La oferta no existe.');
			return;
		}
		$this->nombreOferta = $this->ofertapost->nombrePuesto;
		$this->postulaciones = $this->ofertapost->postulacions()
			->where(function ($queryDos) use ($keyWord) {
				$queryDos->orWhereHas('estudiante', function ($queryEstudiante) use ($keyWord) {
						$queryEstudiante->where('nombre', 'LIKE', $keyWord);
			});
		})
		->get();
        
        return view('livewire.postulacions.view', [
            'postulacions' => Postulacion::latest()
						->paginate(10),
                        "postulaciones"=>$this->postulaciones,
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->fechaPostulacion = null;
		$this->oferta_id = null;
    }

    public function store()
    {
        $this->validate([
		'fechaPostulacion' => 'required',
        ]);

        Postulacion::create([ 
			'fechaPostulacion' => $this-> fechaPostulacion,
			'oferta_id' => $this-> oferta_id
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Postulacion creado exitosamente.');
    }

    public function edit($id)
    {
        $record = Postulacion::findOrFail($id);
        $this->selected_id = $id; 
		$this->fechaPostulacion = $record-> fechaPostulacion;
		$this->oferta_id = $record-> oferta_id;
    }

    public function update()
    {
        $this->validate([
		'fechaPostulacion' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Postulacion::find($this->selected_id);
            $record->update([ 
			'fechaPostulacion' => $this-> fechaPostulacion,
			'oferta_id' => $this-> oferta_id
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Postulación actualizado correctamente.');
        }
    }

    //FUNCION PARA OBETNER EL ID DESDE LA TABLA POSTULACIÓN
    public function setPostulacionId($postulacionId)
    {
        $this->postulacion_id = $postulacionId;
    }

    //FUNCION PARA CREAR LA ENTREVISTA
    public function newEntrevista(){
        $this->validate([
            'tituloEntrevista' => 'required',
            'descripcionEntrevista' => 'required',
            'FechaEntrevista' => 'required | date | after:today',
        ]);

        $postulacion = Postulacion::find($this->postulacion_id);

        if ($postulacion && $postulacion->entrevistas->count() > 0) {
            // Ya hay una entrevista asociada a esta postulación
            $this->reset(['tituloEntrevista', 'descripcionEntrevista', 'FechaEntrevista', 'horaInicio', 'horaFinal']);
            $this->dispatchBrowserEvent('closeModal');
            session()->flash('message', 'Esta postulación ya tiene una entrevista.');
    
        } else {
            // Crear la entrevista solo si no hay una entrevista existente
            Entrevista::create([
                'tituloEntrevista' => $this->tituloEntrevista,
                'descripcionEntrevista' => $this->descripcionEntrevista,
                'FechaEntrevista' => $this->FechaEntrevista,
                'horaInicio' => $this->horaInicio,
                'horaFinal' => $this->horaFinal,
                'Contratado' => "0",
                'comentarioContratado' => " ",
                'postulacion_id' => $this->postulacion_id,
            ]);
		
		$this->dispatchBrowserEvent('closeModal');
        session()->flash('message', 'Entrevista agendada correctamente!');
	}
}

    public function destroy($id)
    {
        if ($id) {
            Postulacion::where('id', $id)->delete();
        }
    }
}
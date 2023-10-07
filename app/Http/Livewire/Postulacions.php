<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Postulacion;
use App\Models\Entrevista;

class Postulacions extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $fechaPostulacion, $oferta_id;
    public $tituloEntrevista, $descripcionEntrevista, $FechaEntrevista, $hora_inicio, $hora_final, $Contratado, $comentarioContratado, $postulacion_id;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.postulacions.view', [
            'postulacions' => Postulacion::latest()
						->orWhere('fechaPostulacion', 'LIKE', $keyWord)
						->orWhere('oferta_id', 'LIKE', $keyWord)
						->paginate(10),
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
		session()->flash('message', 'Postulacion Successfully created.');
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
			session()->flash('message', 'Postulación actualizada!.');
        }
    }

    //FUNCION PARA OBETNER EL ID DESDE LA TABLA POSTULACIÓN
    public function setPostulacionId($id)
    {
        $this->postulacion_id = $id;
    }

    //FUNCION PARA CREAR LA ENTREVISTA
    public function newEntrevista(){
        $this->validate([
            'tituloEntrevista' => 'required',
            'descripcionEntrevista' => 'required',
            'FechaEntrevista' => 'required',
            'hora_inicio' => 'required',
            'hora_final' => 'required',
            'postulacion_id' => 'required',
        ]);

        Entrevista::create([ 
			'tituloEntrevista' => $this-> tituloEntrevista,
			'descripcionEntrevista' => $this-> descripcionEntrevista,
			'FechaEntrevista' => $this-> FechaEntrevista,
			'hora_inicio' => $this-> hora_inicio,
			'hora_final' => $this-> hora_final,
			'Contratado' => "0",
			'comentarioContratado' => "Null",
			'postulacion_id' => $this-> postulacion_id
        ]);
		
		$this->dispatchBrowserEvent('closeModal');
        session()->flash('message', 'Entrevista agendada correctamente!');
	}

    public function destroy($id)
    {
        if ($id) {
            Postulacion::where('id', $id)->delete();
        }
    }
}
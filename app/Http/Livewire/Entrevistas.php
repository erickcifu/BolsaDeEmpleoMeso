<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Entrevista;

class Entrevistas extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $tituloEntrevista, $descripcionEntrevista, $FechaEntrevista, $hora_inicio, $hora_final, $Contratado, $comentarioContratado, $postulacion_id;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.entrevistas.view', [
            'entrevistas' => Entrevista::latest()
						->orWhere('tituloEntrevista', 'LIKE', $keyWord)
						->orWhere('descripcionEntrevista', 'LIKE', $keyWord)
						->orWhere('FechaEntrevista', 'LIKE', $keyWord)
						->orWhere('hora_inicio', 'LIKE', $keyWord)
						->orWhere('hora_final', 'LIKE', $keyWord)
						->orWhere('Contratado', 'LIKE', $keyWord)
						->orWhere('comentarioContratado', 'LIKE', $keyWord)
						->orWhere('postulacion_id', 'LIKE', $keyWord)
						->paginate(10),
        ]);
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
		$this->hora_inicio = null;
		$this->hora_final = null;
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
			'Contratado' => $this-> Contratado,
			'comentarioContratado' => $this-> comentarioContratado,
			'postulacion_id' => $this-> postulacion_id
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Entrevista creada exitosamente.');
    }

	public function mostrar($id)
    {
        $record = Entrevista::findOrFail($id);
        $this->selected_id = $id; 
		$this->tituloEntrevista = $record-> tituloEntrevista;
		$this->descripcionEntrevista = $record-> descripcionEntrevista;
		$this->FechaEntrevista = $record-> FechaEntrevista;
		$this->hora_inicio = $record-> hora_inicio;
		$this->hora_final = $record-> hora_final;
		$this->Contratado = $record-> Contratado;
		$this->comentarioContratado = $record-> comentarioContratado;
		$this->postulacion_id = $record-> postulacion_id;
    }

    public function edit($id)
    {
        $record = Entrevista::findOrFail($id);
        $this->selected_id = $id; 
		$this->tituloEntrevista = $record-> tituloEntrevista;
		$this->descripcionEntrevista = $record-> descripcionEntrevista;
		$this->FechaEntrevista = $record-> FechaEntrevista;
		$this->hora_inicio = $record-> hora_inicio;
		$this->hora_final = $record-> hora_final;
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
		'hora_inicio' => 'required',
		'hora_final' => 'required',
		'postulacion_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Entrevista::find($this->selected_id);
            $record->update([ 
			'tituloEntrevista' => $this-> tituloEntrevista,
			'descripcionEntrevista' => $this-> descripcionEntrevista,
			'FechaEntrevista' => $this-> FechaEntrevista,
			'hora_inicio' => $this-> hora_inicio,
			'hora_final' => $this-> hora_final,
			'Contratado' => $this-> Contratado,
			'comentarioContratado' => $this-> comentarioContratado,
			'postulacion_id' => $this-> postulacion_id
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Entrevista Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Entrevista::where('id', $id)->delete();
        }
    }
}
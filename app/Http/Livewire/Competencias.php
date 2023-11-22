<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Competencia;

class Competencias extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $competenciaId, $nombreCompetencia;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.competencias.view', [
            'competencias' => Competencia::latest()
						->orWhere('competenciaId', 'LIKE', $keyWord)
						->orWhere('nombreCompetencia', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->nombreCompetencia = null;
    }
    protected $rules = [
        'nombreCompetencia' => 'required|regex:/^[\pL\s\-]+$/u',
    ];

  public function updated($propertyCompetencia){
     $this->validateOnly($propertyCompetencia);
   }
    public function store()
    {
        $this->validate();

        Competencia::create([ 
			'competenciaId' => $this-> competenciaId,
			'nombreCompetencia' => $this-> nombreCompetencia
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Competencia Creado.');
    }

    public function edit($competenciaId)
    {
        $record = Competencia::findOrFail($competenciaId);
        $this->selected_id = $competenciaId; 
		$this->nombreCompetencia = $record-> nombreCompetencia;
    }

    public function update()
    {
        $this->validate([
		'nombreCompetencia' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Competencia::find($this->selected_id);
            $record->update([ 
			'nombreCompetencia' => $this-> nombreCompetencia
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Competencia actualizado.');
        }
    }
    public function eliminar($competenciaId)
	{
		$this->selected_id = $competenciaId;
		$this->dispatchBrowserEvent('showDeleteConfirmationModal');
	}

    public function destroy()
    {
        if ($this->selected_id) {
			Competencia::where('competenciaId', $this->selected_id)->delete();
		}
	
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'competencia eliminado');
    }
}
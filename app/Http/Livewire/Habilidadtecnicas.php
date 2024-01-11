<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\habilidadTecnica;
use App\Models\Facultad;

class Habilidadtecnicas extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $tecnicaId, $nombreTecnica, $facultad_id;

    public function render()
    {
        $facultades = Facultad::all();
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.habilidadtecnicas.view', [
            'habilidadtecnicas' => habilidadTecnica::latest()
						->orWhere('tecnicaId', 'LIKE', $keyWord)
						->orWhere('nombreTecnica', 'LIKE', $keyWord)
                        ->orWhereHas('facultad', function ($query) use ($keyWord) {
                            $query->where('Nfacultad', 'LIKE', $keyWord);
                        })
						->paginate(10),
                        'facultades' => $facultades,
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->nombreTecnica = null;
		$this->facultad_id = null;
    }

    public function store()
    {
        $this->validate([
		'nombreTecnica' => 'required|regex:/^[\pL\s\-]+$/u',
		'facultad_id' => 'required',
        ]);

        habilidadTecnica::create([ 
			'nombreTecnica' => $this-> nombreTecnica,
			'facultad_id' => $this-> facultad_id
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Habilidad tecnica creado exitosamente.');
    }

    public function edit($tecnicaId)
    {
        $record = habilidadTecnica::findOrFail($tecnicaId);
        $this->selected_id = $tecnicaId; 
		$this->nombreTecnica = $record-> nombreTecnica;
		$this->facultad_id = $record-> facultad_id;
    }

    public function update()
    {
        $this->validate([
		'nombreTecnica' => 'required|regex:/^[\pL\s\-]+$/u',
		'facultad_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = habilidadTecnica::find($this->selected_id);
            $record->update([ 
			'nombreTecnica' => $this-> nombreTecnica,
			'facultad_id' => $this-> facultad_id
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Habilidad tecnica actualizado correctamente.');
        }
    }

    public function eliminar($tecnicaId)
	{
		$this->selected_id = $tecnicaId;
		$this->dispatchBrowserEvent('showDeleteConfirmationModal');
	}

    public function destroy()
    {
        if ($this->selected_id) {
			habilidadTecnica::where('tecnicaId', $this->selected_id)->delete();
		}
	
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Departamento eliminado.');
    }

}
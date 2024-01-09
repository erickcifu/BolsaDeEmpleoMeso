<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Idioma;

class Idiomas extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $idiomaId, $nombreIdioma;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.idiomas.view', [
            'idiomas' => Idioma::latest()
						->orWhere('idiomaId', 'LIKE', $keyWord)
						->orWhere('nombreIdioma', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->idiomaId = null;
		$this->nombreIdioma = null;
    }

    public function store()
    {
        $this->validate([
		
		'nombreIdioma' => 'required',
        ]);

        Idioma::create([ 
		
			'nombreIdioma' => $this-> nombreIdioma
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Idioma creado exitosamente.');
    }

    public function edit($idiomaId)
    {
        $record = Idioma::findOrFail($idiomaId);
        $this->selected_id = $idiomaId; 
		$this->idiomaId = $record-> idiomaId;
		$this->nombreIdioma = $record-> nombreIdioma;
    }

    public function update()
    {
        $this->validate([
		'idiomaId' => 'required',
		'nombreIdioma' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Idioma::find($this->selected_id);
            $record->update([ 
			'idiomaId' => $this-> idiomaId,
			'nombreIdioma' => $this-> nombreIdioma
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Idioma actualizado correctamente.');
        }
    }

    public function eliminar($idiomaId)
	{
		$this->selected_id = $idiomaId;
		$this->dispatchBrowserEvent('showDeleteConfirmationModal');
	}

    public function destroy()
    {

        if ($this->selected_id) {
			Idioma::where('idiomaId', $this->selected_id)->delete();
		}
	
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Idioma eliminado.');

       
        
    }
}
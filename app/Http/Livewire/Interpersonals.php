<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Interpersonal;

class Interpersonals extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $interpersonalId, $nombreInterpersonal;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.interpersonals.view', [
            'interpersonals' => Interpersonal::latest()
						->orWhere('interpersonalId', 'LIKE', $keyWord)
						->orWhere('nombreInterpersonal', 'LIKE', $keyWord)
						->paginate(10),
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

		$this->nombreInterpersonal = null;
    }

    public function store()
    {
        $this->validate([

		'nombreInterpersonal' => 'required|regex:/^[\pL\s\-]+$/u',
        ]);

        Interpersonal::create([ 

			'nombreInterpersonal' => $this-> nombreInterpersonal
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Habilidad interpersonal creado exitosamente.');
    }

    public function edit($interpersonalId)
    {
        $record = Interpersonal::findOrFail($interpersonalId);
        $this->selected_id = $interpersonalId; 
		$this->nombreInterpersonal = $record-> nombreInterpersonal;
    }

    public function update()
    {
        $this->validate([

		'nombreInterpersonal' => 'required|regex:/^[\pL\s\-]+$/u',
        ]);

        if ($this->selected_id) {
			$record = Interpersonal::find($this->selected_id);
            $record->update([ 
			'nombreInterpersonal' => $this-> nombreInterpersonal
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Habilidad interpersonal actualizado correctamente.');
        }
    }

    public function eliminar($interpersonalId)
	{
		$this->selected_id = $interpersonalId;
		$this->dispatchBrowserEvent('showDeleteConfirmationModal');
	}

    public function destroy()
    {
        if ($this->selected_id) {
			Interpersonal::where('interpersonalId', $this->selected_id)->delete();
		}
	
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'interpersonal eliminado.');
    }
}
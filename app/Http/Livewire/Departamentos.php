<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Departamento;

class Departamentos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $departamentoId, $nombreDepartamento;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.departamentos.view', [
            'departamentos' => Departamento::latest()
						->orWhere('departamentoId', 'LIKE', $keyWord)
						->orWhere('nombreDepartamento', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
	
		$this->nombreDepartamento = null;
    }

    protected $rules = [

        'nombreDepartamento' => 'required|regex:/^[\pL\s\-]+$/u',
		
		
    ];

  public function updated($propertyDepartamento){
     $this->validateOnly($propertyDepartamento);
   }

    public function store()
    {
        $this->validate();

        Departamento::create([ 
			
			'nombreDepartamento' => $this-> nombreDepartamento
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Departamento Creado');
    }

    public function edit($departamentoId)
    {
        $record = Departamento::findOrFail($departamentoId);
        $this->selected_id = $departamentoId; 
		
		$this->nombreDepartamento = $record-> nombreDepartamento;
    }

    public function update()
    {
        $this->validate([
		
            'nombreDepartamento' => 'required|regex:/^[\pL\s\-]+$/u',
        ]);

        if ($this->selected_id) {
			$record = Departamento::find($this->selected_id);
            $record->update([ 
			
			'nombreDepartamento' => $this-> nombreDepartamento
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Departamento Actualizado');
        }
    }

    public function eliminar($departamentoId)
	{
		$this->selected_id = $departamentoId;
		$this->dispatchBrowserEvent('showDeleteConfirmationModal');
	}

    public function destroy()
    {
        if ($this->selected_id) {
			Departamento::where('departamentoId', $this->selected_id)->delete();
		}
	
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Departamento eliminado');
    }

    
}
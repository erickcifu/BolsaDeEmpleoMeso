<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Municipio;
use App\Models\Departamento;

class Municipios extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $municipioId, $nombreMunicipio, $departamento_id;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.municipios.view', [
            'municipios' => Municipio::latest()
						->orWhere('municipioId', 'LIKE', $keyWord)
						->orWhere('nombreMunicipio', 'LIKE', $keyWord)
						->orWhere('departamento_id', 'LIKE', $keyWord)
						->paginate(10),
                        'Departamentos'=>Departamento::all()
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		
		$this->nombreMunicipio = null;
		$this->departamento_id = null;
    }

    protected $rules = [
        'nombreMunicipio' => 'required|regex:/^[\pL\s\-]+$/u',
		'departamento_id' => 'required',
		
		
    ];
    public function updated($propertyMunicipio){
        $this->validateOnly($propertyMunicipio);
      }




    public function store()
    {
        $this->validate();

        Municipio::create([ 
			
			'nombreMunicipio' => $this-> nombreMunicipio,
			'departamento_id' => $this-> departamento_id
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Municipio .');
    }

    public function edit($municipioId)
    {
        $record = Municipio::findOrFail($municipioId);
        $this->selected_id = $municipioId; 
		$this->nombreMunicipio = $record-> nombreMunicipio;
		$this->departamento_id = $record-> departamento_id;
    }

    public function update()
    {
        $this->validate([
		
		'nombreMunicipio' => 'required|regex:/^[\pL\s\-]+$/u',
		'departamento_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Municipio::find($this->selected_id);
            $record->update([ 
			
			'nombreMunicipio' => $this-> nombreMunicipio,
			'departamento_id' => $this-> departamento_id
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Municipio Actalizado.');
        }
    }

    public function eliminar($municipioId)
	{
		$this->selected_id = $municipioId;
		$this->dispatchBrowserEvent('showDeleteConfirmationModal');
	}

    public function destroy()
	{
		if ($this->selected_id) {
			Municipio::where('municipioId', $this->selected_id)->delete();
		}
	
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Municipio Eliminado');
	}
}
<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Facultad;

class Facultads extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $Nfacultad, $EstadoFacultad = true;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.facultads.view', [
            'facultads' => Facultad::latest()
						->orWhere('Nfacultad', 'LIKE', $keyWord)
						->orWhere('EstadoFacultad', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->Nfacultad = null;
		$this->EstadoFacultad = null;
    }
    protected $rules = [ //esta funcion nos realizara las validaciones
		'Nfacultad' => 'required|regex:/^[\pL\s]+$/u|max:40',//validar campos.
		'EstadoFacultad' => 'required',
    ];
    //validaciones en tiempo real para que se marquen cuando en los input.
    public function updated($propertyFacultad){
        $this->validateOnly($propertyFacultad);
    }

    public function store()
    {
//borramos el contenido de las validaciones para que lo trabaje la funcion anterior de igual manera en el actualizar
        $this->validate();

        Facultad::create([ 
			'Nfacultad' => $this-> Nfacultad,
			'EstadoFacultad' => $this-> EstadoFacultad
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Facultad Successfully created.');
    }

    public function edit($id)
    {
        $record = Facultad::findOrFail($id);
        $this->selected_id = $id; 
		$this->Nfacultad = $record-> Nfacultad;
		$this->EstadoFacultad = $record-> EstadoFacultad;
    }

    public function update()
    {//aqui de igual manera quietamos el contenido
        $this->validate();

        if ($this->selected_id) {
			$record = Facultad::find($this->selected_id);
            $record->update([ 
			'Nfacultad' => $this-> Nfacultad,
			'EstadoFacultad' => $this-> EstadoFacultad
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Facultad Successfully updated.');
        }
    }
    // Para poder cambiar de estado o ver lo del eliminar con un modal
    public function edit2($id)
    {
        $record2 = Facultad::findOrFail($id);
        $this->selected_id = $id; 
		$this->Nfacultad = $record2-> Nfacultad;
		$this->EstadoFacultad = $record2-> EstadoFacultad;
    }//funcion que desactiva 
    public function Desc(){
        if ($this->selected_id) {
			$record2 = Facultad::find($this->selected_id);
            $record2->update([ 
            'Nfacultad' => $this-> Nfacultad,
			'EstadoFacultad' =>'0',
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Facultad Se Deshabilitó Exitosamente!.');
        }
    }//funcion para activar de nuevo 
    public function Act(){
        if ($this->selected_id) {
			$record2 = Facultad::find($this->selected_id);
            $record2->update([ 
            'Nfacultad' => $this-> Nfacultad,
			'EstadoFacultad' =>'1',
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Facultad Se Activo Exitosamente!.');
        }
    }


    public function destroy($id)
    {
        if ($id) {
            Facultad::where('id', $id)->delete();
        }
    }
}
<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Carrera;
use App\Models\Facultad;

class Carreras extends Component
{
    public $Nfacultad;
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $Ncarrera, $EstadoCarrera = true, $facultad_id;

    public function render()
    {
        $facultades = Facultad::all();
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.carreras.view', [
            'carreras' => Carrera::with('Facultad')
						->orWhere('Ncarrera', 'LIKE', $keyWord)
						->orWhere('EstadoCarrera', 'LIKE', $keyWord)
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
		$this->Ncarrera = null;
		$this->EstadoCarrera = null;
		$this->facultad_id = null;
    }

    protected $rules = [
        'Ncarrera' => 'required|regex:/^[\pL\s]+$/u|max:45',
		'facultad_id' => 'required',
        'EstadoCarrera' => 'required',
    ];

    public function updated($propertyCarrera){
        $this->validateOnly($propertyCarrera);
    }
    public function store()
    {
        $this->validate();

        Carrera::create([ 
			'Ncarrera' => $this-> Ncarrera,
			'EstadoCarrera' => $this-> EstadoCarrera,
			'facultad_id' => $this-> facultad_id
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Carrera Successfully created.');
    }

    public function edit($id)
    {
        $record = Carrera::findOrFail($id);
        $this->selected_id = $id; 
		$this->Ncarrera = $record-> Ncarrera;
		$this->EstadoCarrera = $record-> EstadoCarrera;
		$this->facultad_id = $record-> facultad_id;
    }

    public function update()
    {
        $this->validate();

        if ($this->selected_id) {
			$record = Carrera::find($this->selected_id);
            $record->update([ 
			'Ncarrera' => $this-> Ncarrera,
			'EstadoCarrera' => $this-> EstadoCarrera,
			'facultad_id' => $this-> facultad_id
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Carrera Successfully updated.');
        }
    }
    public function edit2($id)
    {
        $record2 = Carrera::findOrFail($id);
        $this->selected_id = $id; 
		$this->Ncarrera = $record2-> Ncarrera;
		$this->EstadoCarrera = $record2-> EstadoCarrera;
		$this->facultad_id = $record2-> facultad_id;
    }
    public function Desc()
    {
        if ($this->selected_id) {
			$record2 = Carrera::find($this->selected_id);
            $record2->update([ 
			'Ncarrera' => $this-> Ncarrera,
			'EstadoCarrera' =>'0',
			'facultad_id' => $this-> facultad_id
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Carrera se a Inactivado Exitosamente.');
        }
    }
    public function Act()
    {
        if ($this->selected_id) {
			$record2 = Carrera::find($this->selected_id);
            $record2->update([ 
			'Ncarrera' => $this-> Ncarrera,
			'EstadoCarrera' => '1',
			'facultad_id' => $this-> facultad_id
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Carrera se a Activado Exitosamente.');
        }
    }
    
    public function destroy($id)
    {
        if ($id) {
            Carrera::where('id', $id)->delete();
        }
    }
}
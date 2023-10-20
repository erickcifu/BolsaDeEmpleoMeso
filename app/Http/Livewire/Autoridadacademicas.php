<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Autoridadacademica;
use App\Models\facultad;
class Autoridadacademicas extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $autoridadId, $nombreAutoridad, $apellidosAutoridad, $estadoAutoridad, $facultad_id;

    public function render()
    {
        
    
		$keyWord = '%'.$this->keyWord .'%';
   
        return view('livewire.autoridadacademicas.view', [
             
       
            'autoridadacademicas' => Autoridadacademica::latest()
						->orWhere('autoridadId', 'LIKE', $keyWord)
						->orWhere('nombreAutoridad', 'LIKE', $keyWord)
						->orWhere('apellidosAutoridad', 'LIKE', $keyWord)
						->orWhere('estadoAutoridad', 'LIKE', $keyWord)
						->orWhereHas('facultad', function ($query) use ($keyWord) {
                            $query->where('Nfacultad', 'LIKE', $keyWord);
                        })
						->paginate(10),
                        'facultades'=>facultad::all()
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		

		$this->nombreAutoridad = null;
		$this->apellidosAutoridad = null;
		$this->estadoAutoridad = null;
		$this->facultad_id = null;
    }

    protected $rules = [

        'nombreAutoridad' => 'required|regex:/^[\pL\s\-]+$/u',
		'apellidosAutoridad' => 'required|regex:/^[\pL\s\-]+$/u',
		
		'facultad_id' => 'required',
		
    ];

  public function updated($propertyAutoridadacademica){
     $this->validateOnly($propertyAutoridadacademica);
   }

    public function store()
    {
        $this->validate();

        Autoridadacademica::create([ 
			
			'nombreAutoridad' => $this-> nombreAutoridad,
			'apellidosAutoridad' => $this-> apellidosAutoridad,
			'estadoAutoridad' => "1",
			'facultad_id' => $this-> facultad_id
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Autoridad academica creada');
    }

    public function edit($autoridadId)
    {
        $record = Autoridadacademica::findOrFail($autoridadId);
        $this->selected_id = $autoridadId; 
		
		$this->nombreAutoridad = $record-> nombreAutoridad;
		$this->apellidosAutoridad = $record-> apellidosAutoridad;
		$this->estadoAutoridad = $record-> estadoAutoridad;
		$this->facultad_id = $record-> facultad_id;
    }

    public function update()
    {
        $this->validate([
		
		'nombreAutoridad' => 'required|regex:/^[\pL\s\-]+$/u',
		'apellidosAutoridad' => 'required|regex:/^[\pL\s\-]+$/u',
		'estadoAutoridad' => 'required',
		'facultad_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Autoridadacademica::find($this->selected_id);
            $record->update([ 
			
			'nombreAutoridad' => $this-> nombreAutoridad,
			'apellidosAutoridad' => $this-> apellidosAutoridad,
			'estadoAutoridad' => $this-> estadoAutoridad,
			'facultad_id' => $this-> facultad_id
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Autoridad academica Actualizada');
        }
    }

   // Para poder cambiar de estado o ver lo del eliminar con un modal
   public function edit2($autoridadId)
   {
       $record2 = Autoridadacademica::findOrFail($autoridadId);
       $this->selected_id = $autoridadId; 
       $this->nombreAutoridad = $record2-> nombreAutoridad;
       $this->estadoAutoridad = $record2-> estadoAutoridad;
   }
   public function Desc(){
       if ($this->selected_id) {
           $record2 = Autoridadacademica::find($this->selected_id);
           $record2->update([ 
            'nombreAutoridad' => $this-> nombreAutoridad,
            'estadoAutoridad' =>'0',
           ]);

           $this->resetInput();
           $this->dispatchBrowserEvent('closeModal');
           session()->flash('message', 'Autoridad Se Deshabilitó Exitosamente!.');
       }
   }
   public function Act(){
       if ($this->selected_id) {
           $record2 = Autoridadacademica::find($this->selected_id);
           $record2->update([ 
           'nombreAutoridad' => $this-> nombreAutoridad,
           'estadoAutoridad' =>'1',
           ]);

           $this->resetInput();
           $this->dispatchBrowserEvent('closeModal');
           session()->flash('message', 'Autoridad Se Activo Exitosamente!.');
       }
   }


    public function eliminar($autoridadId)
	{
		$this->selected_id = $autoridadId;
		$this->dispatchBrowserEvent('showDeleteConfirmationModal');
	}

    public function destroy()
    {
        if ($this->selected_id) {
			Autoridadacademica::where('autoridadId', $this->selected_id)->delete();
		}
	
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Autoridad Eliminada');
    }
    
    
}
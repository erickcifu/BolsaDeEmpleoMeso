<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\AutoridadAcademica;
use App\Models\Facultad;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;

class Autoridadacademicas extends Component
{
    use WithPagination;
    use SendsPasswordResetEmails;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $autoridadId, $nombreAutoridad, $apellidosAutoridad, $estadoAutoridad, $facultad_id, $email, $password;
    public $findAutoridad;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
   
        return view('livewire.autoridadacademicas.view', [
            'autoridadacademicas' => AutoridadAcademica::latest()
						->orWhere('autoridadId', 'LIKE', $keyWord)
						->orWhere('nombreAutoridad', 'LIKE', $keyWord)
						->orWhere('apellidosAutoridad', 'LIKE', $keyWord)
						->orWhere('estadoAutoridad', 'LIKE', $keyWord)
						->orWhereHas('facultad', function ($query) use ($keyWord) {
                            $query->where('Nfacultad', 'LIKE', $keyWord);
                        })
						->paginate(10),
                        'facultades'=>Facultad::all()
        ]);
    }
    public function updatingKeyWord(){
        $this->resetPage();
    }
	
    public function cancel()
    {
        $this->resetInput();
        return redirect('autoridadacademicas');
    }
	
    private function resetInput()
    {		
        $this->nombreAutoridad = null;
        $this->apellidosAutoridad = null;
        $this->estadoAutoridad = null;
        $this->facultad_id = null;
        $this->email = null;
        $this->password = null;
    }

    protected $rules = [
        'nombreAutoridad' => 'required| max:50',
        'apellidosAutoridad' => 'required|max:40',
        'email' => 'required',
        'password' => 'required',
        'facultad_id' => 'required',
    ];

  public function updated($propertyAutoridadacademica){
     $this->validateOnly($propertyAutoridadacademica);
   }

   protected $messages = [
    'nombreAutoridad.required' => 'Este campo es obligatorio.',
    'nombreAutoridad.max' => 'Este campo no debe exceder los 50 caracteres.',
    
    'apellidosAutoridad.required' => 'Este campo es obligatorio.',
    'apellidosAutoridad.max' => 'Este campo no debe exceder los 40 caracteres.',
    
    'email.required' => 'Este campo es obligatorio.',
    'email.email' => 'Este campo debe ser una dirección de correo válida.',
    'email.unique' => 'Ya existe un usuario con este correo electrónico.',
    
    'password.required' => 'Este campo es obligatorio.',
    
    'facultad_id.required' => 'Este campo es obligatorio.',
];

    public function store()
    {
        $this->validate();
        // Verifica si el correo ya existe
        $existingUser = User::where('email', $this->email)->first();
        if ($existingUser) {
            $this->dispatchBrowserEvent('closeModal');
            $this->resetInput();
            session()->flash('message', 'El correo ya está registrado.');
            return;
        }
        $request = new Request();

        $user = User::create([
            'name' => $this->nombreAutoridad,
            'email' => $this->email,
            'estado' => 1,
            'password' => Hash::make($this->password),
            'rol_id' => 4,
        ]);

        AutoridadAcademica::create([
            'nombreAutoridad' => $this->nombreAutoridad,
            'apellidosAutoridad' => $this->apellidosAutoridad,
            'estadoAutoridad' => "1",
            'facultad_id' => $this->facultad_id,
            'user_id' => $user->id,
        ]);;
        
        // Llamamos al método sendResetLinkEmail para enviar el correo
        $this->sendResetLinkEmail($request->merge(['email'=> $this->email]));
        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
        session()->flash('message', 'Usuario creado exitosamente.');
        session()->flash('message', 'Se ha enviado un correo para restablecer la contraseña del nuevo usuario');
    }

    public function edit($autoridadId)
    {
        $record = AutoridadAcademica::findOrFail($autoridadId);
        $this->selected_id = $autoridadId;
        $this->nombreAutoridad = $record-> nombreAutoridad;
        $this->apellidosAutoridad = $record-> apellidosAutoridad;
        $this->estadoAutoridad = $record-> estadoAutoridad;
        $this->facultad_id = $record-> facultad_id;
    }

    // public function update()
    // {
    //     $this->validate();

    //     if ($this->selected_id) {
    //         $record = AutoridadAcademica::find($this->selected_id);
    //         $record->update([
    //             'nombreAutoridad' => $this->nombreAutoridad,
    //             'apellidosAutoridad' => $this->apellidosAutoridad,
    //             'estadoAutoridad' => $this->estadoAutoridad,
    //             'facultad_id' => $this->facultad_id
    //         ]);

    //         $user = User::find($record->user_id);
    //         $user->update([
    //             'name' => $this->nombreAutoridad . " ". $this->apellidosAutoridad,
    //         ]);

    //         $this->resetInput();
    //         $this->dispatchBrowserEvent('closeModal');
    //         session()->flash('message', 'Usuario actualizado correctamente.');
    //         return redirect('autoridadacademicas');
    //     }
    // }


    public function update()
{
    $this->validate([
        'nombreAutoridad' => 'required| max:50',
        'apellidosAutoridad' => 'required|max:40',
        'facultad_id' => 'required',
    ]);

    if ($this->selected_id) {
        $record = AutoridadAcademica::find($this->selected_id);

        if (!$record) {
            // Manejar el caso en que no se encuentre el registro
            session()->flash('message', 'No se encontró el registro para actualizar.');
            return;
        }

        try {
            $record->update([
                'nombreAutoridad' => $this->nombreAutoridad,
                'apellidosAutoridad' => $this->apellidosAutoridad,
                'estadoAutoridad' => $this->estadoAutoridad,
                'facultad_id' => $this->facultad_id
            ]);

            $user = User::find($record->user_id);
            $user->update([
                'name' => $this->nombreAutoridad . " " . $this->apellidosAutoridad,
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
            session()->flash('message', 'Usuario actualizado correctamente.');
        } catch (\Exception $e) {
            // Manejar errores en la actualización
            session()->flash('message', 'Error al actualizar el usuario: ' . $e->getMessage());
        }

        return redirect('autoridadacademicas');
    }
}


   // Para poder cambiar de estado o ver lo del eliminar con un modal
   public function edit2($autoridadId)
   {
        $record2 = AutoridadAcademica::findOrFail($autoridadId);
        $this->selected_id = $autoridadId;
        $this->nombreAutoridad = $record2->nombreAutoridad;
        $this->estadoAutoridad = $record2->estadoAutoridad;
   }
   public function Desc(){
        if ($this->selected_id) {
            $record2 = AutoridadAcademica::find($this->selected_id);
            $record2->update([
                'nombreAutoridad' => $this->nombreAutoridad,
                'estadoAutoridad' => '0',
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
            session()->flash('message', 'Usuario desactivado!');
        }
   }
   public function Act(){
        if ($this->selected_id) {
            $record2 = AutoridadAcademica::find($this->selected_id);
            $record2->update([
                'nombreAutoridad' => $this->nombreAutoridad,
                'estadoAutoridad' => '1',
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
            session()->flash('message', 'Usuario activado!');
        }
   }


    public function eliminar($autoridadId)
	{
        $this->findAutoridad = AutoridadAcademica::where('autoridadId', $autoridadId)->first();
		$this->selected_id = $autoridadId;
        $this->dispatchBrowserEvent('showDeleteConfirmationModal');
	}

    public function destroy()
    {
        if ($this->selected_id) {
            $userId = $this->findAutoridad->user_id;

            AutoridadAcademica::where('autoridadId', $this->selected_id)->delete();
            User::where('id', $userId)->delete();
        }

        $this->dispatchBrowserEvent('closeModal');
        session()->flash('message', 'Usuario Eliminado.');
        return redirect('autoridadacademicas');
    }
    
    
}
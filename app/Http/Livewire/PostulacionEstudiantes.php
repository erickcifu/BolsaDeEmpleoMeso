<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Postulacion;
use App\Models\Entrevista;
use App\Models\Estudiante;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PostulacionEstudiantes extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $fechaPostulacion, $oferta_id;
    public $tituloEntrevista, $descripcionEntrevista, $FechaEntrevista, $hora_inicio, $hora_final, $Contratado, $comentarioContratado, $postulacion_id;
    public $mensaje, $usuarioAutenticado, $postulacionesEstudiante;
    public $record2, $user;

    public function render()
    {
        if (Auth::check()) {
        // Obtén el usuario autenticado
        $this->usuarioAutenticado = Auth::id();

        $this->user = User::with('estudiante')->find($this->usuarioAutenticado);
        
        $keyWord = '%'.$this->keyWord .'%';
        // Accede a las postulaciones del estudiante
    	$this->postulacionesEstudiante = $this->user->Estudiante->postulacions()
            ->where(function ($query) use ($keyWord) {
                $query->orWhere('fechaPostulacion', 'LIKE', $keyWord)
                ->orWhereHas('oferta', function ($queryOferta) use ($keyWord) {
                    $queryOferta->where('nombrePuesto', 'LIKE', $keyWord);
                });
            })
            ->get();

           
            return view('livewire.postulacionestudiantes.postulacionestudiante', [
                'postulacionStudent' => Postulacion::latest()
                    ->paginate(10), 
                    "postulacionesEstudiante" => $this->postulacionesEstudiante,
            ]);
            
        }
    }
		

    public function cancel()
    {
        $this->dispatchBrowserEvent('closeModal');
    }
	
    private function resetInput()
    {		
		$this->fechaPostulacion = null;
		$this->oferta_id = null;
    }

    public function store()
    {
        $this->validate([
		'fechaPostulacion' => 'required',
        ]);

        Postulacion::create([ 
			'fechaPostulacion' => $this-> fechaPostulacion,
			'oferta_id' => $this-> oferta_id
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Postulacion creado exitosamente.');
    }

    public function edit($id)
    {
        $record = Postulacion::findOrFail($id);
        $this->selected_id = $id; 
		$this->fechaPostulacion = $record-> fechaPostulacion;
		$this->oferta_id = $record-> oferta_id;
    }

    public function update()
    {
        $this->validate([
		'fechaPostulacion' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Postulacion::find($this->selected_id);
            $record->update([ 
			'fechaPostulacion' => $this-> fechaPostulacion,
			'oferta_id' => $this-> oferta_id
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Postulación actualizado correctamente.');
        }
    }

    //Eliminar
    public function edit2($postulacionId)
    {
        $this->selected_id = $postulacionId;
        $this->dispatchBrowserEvent('showDeletDataModal');
    }

	//Método de eliminación
	public function destroy()
    {
        if ($this->selected_id) {
			Postulacion::where('postulacionId', $this->selected_id)->delete();
			
        }
        $this->dispatchBrowserEvent('closeModal');
        session()->flash('message', 'Postulación eliminada correctamente');
    }

}
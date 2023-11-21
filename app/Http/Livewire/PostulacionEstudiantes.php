<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Postulacion;
use App\Models\Entrevista;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PostulacionEstudiantes extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $fechaPostulacion, $oferta_id;
    public $tituloEntrevista, $descripcionEntrevista, $FechaEntrevista, $hora_inicio, $hora_final, $Contratado, $comentarioContratado, $postulacion_id;
    public $mensaje, $usuarioAutenticado, $postulacionesEstudiante;
    public $record2;

    public function render()
    {
        // Obtén el usuario autenticado
        $this->usuarioAutenticado = Auth::user();

        // Verifica si el usuario tiene un perfil de estudiante
        if ($this->usuarioAutenticado->Estudiante) {
            // Obtén las postulaciones del estudiante
            $this->postulacionesEstudiante = $this->usuarioAutenticado->postulacionesEstudiante;

            $keyWord = '%'.$this->keyWord .'%';
            return view('livewire.postulacionestudiantes.postulacionestudiante', [
                'postulacionStudent' => Postulacion::latest()
                            ->orWhere('fechaPostulacion', 'LIKE', $keyWord)
                            ->orWhere('oferta_id', 'LIKE', $keyWord)
                            ->paginate(10), $this->postulacionesEstudiante
            ]);
        } else {
            // Manejar el caso donde el usuario no tiene un perfil de estudiante
            $this->mensaje = "No existe el usuario o no es un estudiante";
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
		session()->flash('message', 'Postulacion Successfully created.');
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
			session()->flash('message', 'Postulación actualizada!.');
        }
    }

    //Eliminar
    public function edit2($postulacionId)
    {
        $this->record2 = Postulacion::where('postulacionId', $postulacionId)->first();
    }

	//Método de eliminación
	public function destroy()
    {
        if ($this->record2) {
			Postulacion::where('postulacionId', $this->record2->postulacionId)->delete();
			session()->flash('message', 'Postulación eliminada correctamente');
        }
    }

}
<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Empresa;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PreRegistro extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name, $email, $password, $estado, $avatar, $rol_id;
    
    
    public function render()
    {
        $keyWord = '%' . $this->keyWord . '%';

        // $enProceso= "SELECT * FROM users WHERE rol_id = 2 AND not exists (SELECT * FROM empresas WHERE users.id = empresas.user_id) order by `created_at` desc";

        // $enProceso= DB::select( $enProceso);

        // return view ('livewire.preRegistro.pre-registro',compact('enProceso'));

        $enProceso = User::latest()
        ->where('rol_id', 2)
        ->whereDoesntHave('empresa')
        ->where(function($query) use ($keyWord) {
            $query->where('name', 'like', $keyWord)
                  ->orWhere('email', 'like', $keyWord);
        })
        ->paginate(10);

        return view('livewire.preRegistro.pre-registro', compact('enProceso'));
    }

    public function updatingKeyWord(){
        $this->resetPage();
    }
    public function cancel()
    {
        $this->resetInput();
    }

    public function refreshTable(){
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.preRegistro.pre-registro', [
            'enProceso' => User::latest()
            ->where('rol_id', 2)
            ->whereDoesntHave('empresa')
            ->get(),
        ]);
	}
}

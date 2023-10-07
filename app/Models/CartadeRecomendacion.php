<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartadeRecomendacion extends Model
{
    use HasFactory;

    protected $primaryKey = 'cartaId';

    protected $table = 'cartarecomendacions';

    protected $fillable = [
        'fechaCarta',
        'cargoYTareasRealizadas',
        'telefonoAutoridad',
        'firmaAutoridad',
        'autoridadAcademica_id',
        'estudiante_id'
    ];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function autoridadacademica()
    {
        return $this->hasOne('App\Models\Autoridadacademica', 'autoridadId', 'autoridadAcademica_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estudiante()
    {
        return $this->hasOne('App\Models\Estudiante', 'estudianteId', 'estudiante_id');
    }
}

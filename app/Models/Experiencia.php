<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experiencia extends Model
{
    use HasFactory;

    protected $primaryKey = 'experienciaId';

    public $timestamps = true;

    protected $table = 'experiencias';

    protected $fillable = [
        'inicioExperiencia',
        'finExperiencia',
        'puestoTrabajo',
        'lugarTrabajo',
        'descripcionLaboral',
        'cv_id',
    ];
	

     /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cv()
    {
        return $this->hasOne('App\Models\Cv', 'cvId', 'cv_id');
    }

}

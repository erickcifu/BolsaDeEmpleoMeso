<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = 'facultads';

    protected $fillable = ['Nfacultad','EstadoFacultad'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function carreras()
    {
        return $this->hasMany('App\Models\Carrera', 'facultad_id', 'id');
    }

    public function autoridadacademicas()
    {
        return $this->hasMany('App\Models\AutoridadAcademica', 'facultad_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Carrera
 *
 * @property $id
 * @property $carrera
 * @property $facultad_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Estudiante[] $estudiantes
 * @property Facultade $facultade
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Carrera extends Model
{
    static $rules = [
		'carrera' => 'required',
		'facultad_id' => 'required',
        'Estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['carrera','facultad_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function estudiantes()
    {
        return $this->hasMany('App\Models\Estudiante', 'carrera_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function facultade()
    {
        return $this->hasOne('App\Models\Facultad', 'id', 'facultad_id');
    }
     
}

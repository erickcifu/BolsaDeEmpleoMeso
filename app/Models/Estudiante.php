<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Estudiante
 *
 * @property $id
 * @property $nombre
 * @property $apellidos
 * @property $carnet
 * @property $DPI
 * @property $correo
 * @property $numero_personal
 * @property $numero_domiciliar
 * @property $residencia_id
 * @property $carrera_id
 * @property $user_id
 * @property $created_at
 * @property $updated_at
 *
 *  @property Postulacion[] $postulaciones
 *
 * @property Carrera $carrera
 * @property Residencia $residencia
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Estudiante extends Model
{

    static $rules = [
		'nombre' => 'required',
		'apellidos' => 'required',
        'carnet' => 'required',
        'DPI' => 'required',
		'correo' => 'required',
		'numero_personal' => 'required',
		'numero_domiciliar' => 'required',
        'curriculum' => 'required',
		'residencia_id' => 'required',
		'carrera_id' => 'required',
        'user_id' => 'user_id',
    ];
    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','apellidos','carnet','DPI','correo','numero_personal','numero_domiciliar','curriculum','residencia_id','carrera_id', 'user_id'];


     /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function postulaciones()
    {
        return $this->hasMany('App\Models\Postulacion', 'empresa_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function carrera()
    {
        return $this->hasOne('App\Models\Carrera', 'id', 'carrera_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User', 'id', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function residencia()
    {
        return $this->hasOne('App\Models\Residencia', 'id', 'residencia_id');
    }

}

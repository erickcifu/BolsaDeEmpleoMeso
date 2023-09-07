<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Postulacion
 *
 * @property $id
 * @property $fechaPosulacion
 * @property $estudiante_id
 *
 * @property $oferta_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Entrevista[] $entrevistas
 * @property Estudiante $estudiante
 * @property Oferta $oferta
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Postulacion extends Model
{
    static $rules = [
		'fechaPosulacion' => 'required',
        'estadoPostulado'=> 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fechaPosulacion','estadoPostulado','estudiante_id','oferta_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function entrevistas()
    {
        return $this->hasMany('App\Models\Entrevista', 'postulacion_id', 'id');
    }

     /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estudiante()
    {
        return $this->hasOne('App\Models\estudiante', 'id', 'estudiante_id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function oferta()
    {
        return $this->hasOne('App\Models\Oferta', 'id', 'oferta_id');
    }
}

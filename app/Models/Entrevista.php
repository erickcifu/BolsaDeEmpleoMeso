<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Entrevista
 *
 * @property $id
 * @property $tituloEntrevista
 * @property $descripcionEntrevista
 * @property $FechaEntrevista
 * @property $hora_inicio
 * @property $hora_final
 * @property $Contratado
 * @property $comentarioContratado
 * @property $postulacion_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Contratacion[] $contratacions
 * @property Postulacion $postulacion
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Entrevista extends Model
{
    static $rules = [
        'tituloEntrevista'=>'required',
		'descripcionEntrevista' => 'required',
		'FechaEntrevista' => 'required',
		'hora_inicio' => 'required',
		'hora_final' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tituloEntrevista','descripcionEntrevista','FechaEntrevista','hora_inicio','hora_final','Contratado','comentarioContratado','postulacion_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contrataciones()
    {
        return $this->hasMany('App\Models\Contratacion', 'entrevista_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function postulacione()
    {
        return $this->hasOne('App\Models\Postulacion', 'id', 'postulacion_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Oferta
 *
 * @property $id
 * @property $descripcion
 * @property $puesto
 * @property $imagen
 * @property $sueldo_minimo
 * @property $fecha
 * @property $puestos_vacantes
 * @property $tipo_contratacion
 * @property $edad_requerida
 * @property $genero
 * @property $perfil
 * @property $sueldo_maximo
 * @property $facultad_id
 * @property $empresa_id
 * @property $created_at
 * @property $updated_at
 * @property Facultad $facultad
 * @property Empresa $empresa
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Oferta extends Model
{
    static $rules = [
		'descripcion' => 'required',
		'puesto' => 'required',
        'imagen'=>'required',
		'sueldoMinimo' => 'required',
		'fecha' => 'required',
		'puestoVacante' => 'required',
		'tipoContratacion' => 'required',
		'edadRequerida' => 'required',
		'genero' => 'required',
        'perfil' => 'required',
        'sueldoMax' => 'required',
        'facultad_id'=>'required',

    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['descripcion','puesto','imagen','sueldoMinimo','fecha','puestoVacante','tipoContratacion','edadRequerida','genero', 'perfil','sueldoMax','facultad_id','empresa_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function empresa()
    {
        return $this->hasOne('App\Models\Empresa', 'id', 'empresa_id');
    }
    public function facultad()
    {
        return $this->hasOne('App\Models\facultad', 'id', 'facultad_id');
    }
}

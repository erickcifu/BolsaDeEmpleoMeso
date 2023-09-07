<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Empresa
 *
 * @property $id
 * @property $nombre_empresa
 * @property $nit
 * @property $RTU
 * @property $patenteDeComercio
 * @property $descripcion
 * @property $municipio_id
 * @property $telefonoEmpresa
 * @property $correoEmpresa
 * @property $direccionEmpresa
 * @property $estadoEmpresa
 * @property $user_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Oferta[] $ofertas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Empresa extends Model
{
     
    static $rules = [
    'logo' => 'required',
	'nombre_empresa' => 'required',
    'nit' => 'required',
    'RTU' => 'required',
    'patenteDeComercio' => 'required',
	'descripcion' => 'required',
    'residencia_id'=>'required',
    'telefonoEmpresa'=>'required',
    'correoEmpresa'=>'required',
    'direccionEmpresa'=>'required',
    'estadoEmpresa' => 'required',
    'user_id'=>'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre_empresa','descripcion','municipio_id', 'telefonoEmpresa', 'correoEmpresa', 'direccionEmpresa','estadoEmpresa', 'user_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function residencia()
    {
        return $this->hasOne('App\Models\Municipio', 'id', 'residencia_id');

    }

    public function user(){
        return $this->belongsTo('App\Models\User', 'id', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ofertas()
    {
        return $this->hasMany('App\Models\Oferta', 'empresa_id', 'id');
    }
}

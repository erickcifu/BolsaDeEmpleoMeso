<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Municipio
 *
 * @property $id
 * @property $municipio
 * @property $departamento_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Departamento $departamento
 * @property Estudiante[] $estudiantes
 * @property Empresa[] $empresas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Municipio extends Model
{
    protected $primaryKey = 'municipioId';

    static $rules = [
		'nombreMunicipio' => 'required',
		'departamento_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombreMunicipio','departamento_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function departamento()
    {
        return $this->hasOne('App\Models\Departamento', 'departamentoId', 'departamento_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function estudiantes()
    {
        return $this->hasMany('App\Models\Estudiante', 'residencia_id', 'municipioId');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function empresas()
    {
        return $this->hasMany('App\Models\Empresa', 'residencia_id', 'municipioId');
    }
}

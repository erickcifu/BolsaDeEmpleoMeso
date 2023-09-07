<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Departamento
 *
 * @property $id
 * @property $departamento
 * @property $created_at
 * @property $updated_at
 *
 * @property Residencia[] $residencias
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Departamento extends Model
{
    static $rules = [
		'departamento' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['departamento'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function residencias()
    {
        return $this->hasMany('App\Models\Residencia', 'departamento_id', 'id');
    }
}

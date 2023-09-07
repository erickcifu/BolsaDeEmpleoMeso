<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Municipio
 *
 * @property $id
 * @property $municipio
 * @property $residencia_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Residencia $residencia
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Municipio extends Model
{
    static $rules = [
		'municipio' => 'required',
		'residencia_id' => 'required',
    ];

    protected $perPage = 20;
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['municipio','residencia_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function residencia()
    {
        return $this->hasOne('App\Models\Residencia', 'id', 'residencia_id');
    }
}

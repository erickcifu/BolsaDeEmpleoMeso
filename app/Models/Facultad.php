<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * Class Facultade
 *
 * @property $id
 * @property $facultad
 * @property $EstadoFacultad
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */

class Facultad extends Model
{
    static $rules = [
		'facultad' => 'required',
        'EstadoFacultad' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['facultad', 'EstadoFacultad'];

    public function ofertas()
    {
        return $this->hasMany('App\Models\oferta', 'facultad_id', 'id');
    }
}

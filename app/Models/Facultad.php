<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * Class Facultade
 *
 * @property $id
 * @property $facultad
 * @property $Estado
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
        'Estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['facultad', 'Estado'];

    public function ofertas()
    {
        return $this->hasMany('App\Models\oferta', 'facultad_id', 'id');
    }
}

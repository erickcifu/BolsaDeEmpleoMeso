<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formacion extends Model
{
    use HasFactory;

    protected $primaryKey = 'formacionId';

    public $timestamps = true;

    protected $table = 'formacions';

    protected $fillable = [
        'anioInicioFormacion',
        'anioFinFormacion',
        'nivelFormacion',
        'institucionFormacion',
        'cv_id',
    ];
	

     /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cv()
    {
        return $this->hasOne('App\Models\Cv', 'cvId', 'cv_id');
    }
}

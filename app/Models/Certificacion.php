<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificacion extends Model
{
    use HasFactory;

    protected $primaryKey = 'certificacionId';

    public $timestamps = true;

    protected $table = 'certificacions';

    protected $fillable = [
        'nombreCertificacion',
        'anioCertificacion',
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

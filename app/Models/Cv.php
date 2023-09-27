<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $table = 'cvs';

    protected $fillable = [
        'direcionDomiciliar',
        'correoElectronico',
        'telefonoCv',
        'fotoCv', 
        'perfilProfesional', 
        'habilidades', 
        'referencias', 
        'publicaciones', 
        'intereses',
        'estudiante_id',
    ];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function idiomaCV()
    {
        return $this->hasMany('App\Models\Idiomacv', 'cv_id', 'cvId');
    }

     /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estudiante()
    {
        return $this->hasOne('App\Models\Estudiante', 'estudianteId', 'estudiante_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function certificacions()
    {
        return $this->hasMany('App\Models\Certificacion', 'cv_id', 'cvId');
    }

    public function formacions()
    {
        return $this->hasMany('App\Models\Formacion', 'cv_id', 'cvId');
    }

    public function experiencias()
    {
        return $this->hasMany('App\Models\Experiencia', 'cv_id', 'cvId');
    }
}

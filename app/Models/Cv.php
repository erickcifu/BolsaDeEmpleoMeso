<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'cvs';

    protected $fillable = ['cvId','direcionDomiciliar','correoElectronico','telefonoCv','fotoCv','perfilProfesional','habilidades','referencias','publicaciones','intereses'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function certificacions()
    {
        return $this->hasMany('App\Models\Certificacion', 'cv_id', 'cvId');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function experiencias()
    {
        return $this->hasMany('App\Models\Experiencia', 'cv_id', 'cvId');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function formacions()
    {
        return $this->hasMany('App\Models\Formacion', 'cv_id', 'cvId');
    }
    
}

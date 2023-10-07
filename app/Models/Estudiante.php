<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'estudiantes';
    protected $primaryKey = 'estudianteId';
    protected $fillable = ['estudianteId','nombre','apellidos','carnet','DPI','correo','numero_personal','numero_domiciliar','curriculum','municipio_id','carrera_id','user_id'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function carrera()
    {
        return $this->hasOne('App\Models\Carrera', 'id', 'carrera_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cartarecomendacions()
    {
        return $this->hasMany('App\Models\Cartarecomendacion', 'estudiante_id', 'estudianteId');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function municipio()
    {
        return $this->hasOne('App\Models\Municipio', 'municipioId', 'municipio_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function postulacions()
    {
        return $this->hasMany('App\Models\Postulacion', 'estudiante_id', 'estudianteId');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    
}

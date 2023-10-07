<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postulacion extends Model
{
	use HasFactory;
	
    protected $primaryKey = 'postulacionId';

    public $timestamps = true;

    protected $table = 'postulacions';

    protected $fillable = ['fechaPostulacion', 'estadoPostulacion','estudiante_id','oferta_id'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function autoridadAcademicas()
    {
        return $this->hasMany('App\Models\AutoridadAcademica', 'postulacion_id', 'postulacionId');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function entrevistas()
    {
        return $this->hasMany('App\Models\Entrevista', 'postulacion_id', 'postulacionId');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function oferta()
    {
        return $this->hasOne('App\Models\Oferta', 'ofertaId', 'oferta_id');
    }
    

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estudiante()
    {
        return $this->hasOne('App\Models\Estudiante', 'estudianteId', 'estudiante_id');
    }
}

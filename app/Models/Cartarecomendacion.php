<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Jenssegers\Date\Date;

class Cartarecomendacion extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'cartarecomendacions';
    protected $primaryKey = 'cartaId';
    protected $fillable = ['cartaId','fechaCarta','cargoYTareasRealizadas','telefonoAutoridad','firmaAutoridad','autoridadAcademica_id','estudiante_id'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function autoridadacademica()
    {
        return $this->hasOne('App\Models\AutoridadAcademica', 'autoridadId', 'autoridadAcademica_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estudiante()
    {
        return $this->hasOne('App\Models\Estudiante', 'estudianteId', 'estudiante_id');
    }

    // public function gerCreatedAtAttributes($date){

    //     return new Date($date);
    // }
}

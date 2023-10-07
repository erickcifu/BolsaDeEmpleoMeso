<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrevista extends Model
{
	use HasFactory;

	protected $primaryKey = 'entrevistaId';

    public $timestamps = true;

    protected $table = 'entrevistas';

    protected $fillable = [
        'tituloEntrevista',
        'descripcionEntrevista',
        'FechaEntrevista',
        'horaInicio',
        'horaFinal',
        'Contratado',
        'comentarioContratado',
        'postulacion_id'
    ];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function postulacion()
    {
        return $this->hasOne('App\Models\Postulacion', 'postulacionId', 'postulacion_id');
    }
    
}

<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'facultads';

    protected $fillable = ['Nfacultad','EstadoFacultad'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function autoridadacademicas()
    {
        return $this->hasMany('App\Models\Autoridadacademica', 'facultad_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function carreras()
    {
        return $this->hasMany('App\Models\Carrera', 'facultad_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ofertas()
    {
        return $this->hasMany('App\Models\Oferta', 'facultad_id', 'id');
    }
    
}

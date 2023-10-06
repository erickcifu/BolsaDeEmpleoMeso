<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autoridadacademica extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'autoridadacademicas';
    protected $primaryKey = 'autoridadId';

    protected $fillable = ['autoridadId','nombreAutoridad','apellidosAutoridad','estadoAutoridad','facultad_id'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cartarecomendacions()
    {
        return $this->hasMany('App\Models\Cartarecomendacion', 'autoridadAcademica_id', 'autoridadId');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function facultad()
    {
        return $this->hasOne('App\Models\Facultad', 'id', 'facultad_id');
    }
    
}

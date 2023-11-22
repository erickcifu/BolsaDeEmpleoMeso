<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habilidadtecnica extends Model
{
	use HasFactory;
    protected $primaryKey = 'tecnicaId';
	
    public $timestamps = true;

    protected $table = 'habilidadtecnicas';

    protected $fillable = ['tecnicaId','nombreTecnica','facultad_id'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function facultad()
    {
        return $this->hasOne('App\Models\Facultad', 'id', 'facultad_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ofertatecnicas()
    {
        return $this->hasMany('App\Models\Ofertatecnica', 'tecnica_id', 'tecnicaId');
    }
    
}

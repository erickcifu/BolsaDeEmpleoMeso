<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competencia extends Model
{
	use HasFactory;
    protected $primaryKey = 'competenciaId';

    public $timestamps = true;

    protected $table = 'competencias';

    protected $fillable = ['competenciaId','nombreCompetencia'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ofertacompetencias()
    {
        return $this->hasMany('App\Models\Ofertacompetencia', 'competencia_id', 'competenciaId');
    }
    
}

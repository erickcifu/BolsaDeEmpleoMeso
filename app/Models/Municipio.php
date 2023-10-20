<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'municipios';
    protected $primaryKey = 'municipioId';

    protected $fillable = ['municipioId','nombreMunicipio','departamento_id'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function departamento()
    {
        return $this->hasOne('App\Models\Departamento', 'departamentoId', 'departamento_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function empresa()
    {
        return $this->hasOne('App\Models\Empresa', 'residencia_id', 'municipioId');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function estudiantes()
    {
        return $this->hasMany('App\Models\Estudiante', 'municipio_id', 'municipioId');
    }
    
}

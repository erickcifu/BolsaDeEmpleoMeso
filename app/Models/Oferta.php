<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
	use HasFactory;
	
    protected $primaryKey = 'ofertaId';

    public $timestamps = true;

    protected $table = 'ofertas';

    protected $fillable = [
        'nombrePuesto',
        'resumenPuesto',
        'responsabilidadesPuesto',
        'requisitosEducativos',
        'experienciaLaboral',
        'sueldoMax',
        'sueldoMinimo',
        'jornadaLaboral',
        'condicionesLaborales',
        'beneficios',
        'oportunidadesDesarrollo',
        'fechaMax', 
        'imagenPuesto',
        'cantVacantes',
        'modalidadTrabajo',
        'edadRequerida',
        'generoRequerido',
        'comentarioCierre',
        'estadoOferta',
        'empresa_id',
        'facultad_id',
    ];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function empresa()
    {
        return $this->hasOne('App\Models\Empresa', 'empresaId', 'empresa_id');
    }
    
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
    public function postulacions()
    {
        return $this->hasMany('App\Models\Postulacion', 'oferta_id', 'ofertaId');
    }
    
    public function ofertatecnicas()
    {
        return $this->hasMany('App\Models\ofertaTecnica', 'oferta_id', 'ofertaId');
    }

    public function ofertainterpersonals()
    {
        return $this->hasMany('App\Models\ofertaInterpersonal', 'oferta_id', 'ofertaId');
    }

    public function ofertacompentencias()
    {
        return $this->hasMany('App\Models\ofertaCompetencia', 'oferta_id', 'ofertaId');
    }
}

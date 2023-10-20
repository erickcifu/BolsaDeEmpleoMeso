<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'empresas';
    protected $primaryKey = 'empresaId';
    

    protected $fillable = ['empresaId','logo','nombreEmpresa','nit','rtu','patenteComercio','descripcionEmpresa','telefonoEmpresa','correoEmpresa','direccionEmpresa','encargadoEmpresa','telefonoEncargado','estadoEmpresa','estadoSolicitud','user_id','residencia_id'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function municipio()
    {
        return $this->hasOne('App\Models\Municipio', 'municipioId', 'residencia_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ofertas()
    {
        return $this->hasMany('App\Models\Oferta', 'empresa_id', 'empresaId');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    
}

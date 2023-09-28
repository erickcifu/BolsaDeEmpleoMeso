<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutoridadAcademica extends Model
{
    use HasFactory;

    protected $primaryKey = 'autoridadId';
    
    public $timestamps = true;

    protected $table = 'autoridadacademicas';

    protected $fillable = [
        'nombreAutoridad',
        'apellidosAutoridad',
        'estadoAutoridad',
        'facultad_id'
    ];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function facultad()
    {
        return $this->hasOne('App\Models\facultad', 'id', 'facultad_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cartadeRecomendacions()
    {
        return $this->hasMany('App\Models\CartadeRecomendacion', 'autoridadAcademica_id', 'autoridadId');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
}

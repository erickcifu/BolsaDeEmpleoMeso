<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ofertaCompetencia extends Model
{
    use HasFactory;

    protected $primaryKey = 'ofertaCompentenciaId';

    public $timestamps = true;

    protected $table = 'ofertacompetencias';

    protected $fillable = [
        'oferta_id',
        'competencia_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ofertas()
    {
        return $this->hasMany('App\Models\Oferta', 'ofertaId', 'oferta_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ofertacompentencias()
    {
        return $this->hasMany('App\Models\Competencia', 'competenciaId', 'competencia_id');
    }
}

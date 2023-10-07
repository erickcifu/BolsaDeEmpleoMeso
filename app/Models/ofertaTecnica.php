<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ofertaTecnica extends Model
{
    use HasFactory;

    protected $primaryKey = 'ofertaTecnicaId';

    public $timestamps = true;

    protected $table = 'ofertatecnicas';

    protected $fillable = [
        'oferta_id',
        'tecnica_id',
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
    public function habilidadtecnicas()
    {
        return $this->hasMany('App\Models\habilidadTecnica', 'tecnicaId', 'tecnica_id');
    }
}

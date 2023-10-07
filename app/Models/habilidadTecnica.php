<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class habilidadTecnica extends Model
{
    use HasFactory;

    protected $primaryKey = 'tecnicaId';

    public $timestamps = true;

    protected $table = 'habilidadtecnicas';

    protected $fillable = [
        'nombreTecnica',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ofertatecnicas()
    {
        return $this->hasMany('App\Models\ofertaTecnica', 'tecnica_id', 'tecnicaId');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class competencia extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $primaryKey = 'competenciaId';

    protected $table = 'competencias';

    protected $fillable = [
        'nombreCompetencia',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ofertacompentencias()
    {
        return $this->hasMany('App\Models\ofertaCompetencia', 'competencia_id', 'competenciaId');
    }
}

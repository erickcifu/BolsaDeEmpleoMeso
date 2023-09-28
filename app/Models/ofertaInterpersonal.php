<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ofertaInterpersonal extends Model
{
    public $timestamps = true;

    protected $primaryKey = 'ofertaInterpersonalId';

    protected $table = 'ofertainterpersonals';

    protected $fillable = [
        'oferta_id',
        'interpersonal_id',
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
    public function interpersonals()
    {
        return $this->hasMany('App\Models\Interpersonal', 'interpersonalId', 'interpersonal_id');
    }
}

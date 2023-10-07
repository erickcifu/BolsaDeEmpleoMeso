<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interpersonal extends Model
{
    use HasFactory;

    protected $primaryKey = 'interpersonalId';

    public $timestamps = true;

    protected $table = 'interpersonals';

    protected $fillable = [
        'nombreInterpersonal',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ofertainterpersonals()
    {
        return $this->hasMany('App\Models\ofertaInterpersonal', 'interpersonal_id', 'interpersonalId');
    }
}

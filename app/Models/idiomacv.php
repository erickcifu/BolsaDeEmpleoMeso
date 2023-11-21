<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class idiomacv extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $primaryKey = 'idiomacvId';

    protected $table = 'idiomacvs';

    protected $fillable = [
        'idioma_id',
        'cv_id',
        'nivelIdioma',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cvs()
    {
        return $this->hasOne('App\Models\Cv', 'cvId', 'cv_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function idiomas()
    {
        return $this->hasOne('App\Models\Idioma', 'idiomaId', 'idioma_id');
    }
}

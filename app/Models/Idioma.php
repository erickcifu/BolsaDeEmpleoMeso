<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idioma extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'idiomas';
    protected $primaryKey = 'idiomaId';

    protected $fillable = ['idiomaId','nombreIdioma'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function idiomacvs()
    {
        return $this->hasMany('App\Models\Idiomacv', 'idioma_id', 'idiomaId');
    }
    
}

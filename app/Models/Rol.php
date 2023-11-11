<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $table = 'rols';
    protected $primaryKey = 'rolId';
    protected $fillable = ['nombreRol'];

    /**
    * @return \Illuminate\Database\Eloquent\Relations\HasOne
    */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'rol_id', 'rolId');
    }
}

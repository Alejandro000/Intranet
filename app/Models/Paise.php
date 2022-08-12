<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paise extends Model
{
    use HasFactory;

    protected $fillable = ['paises'];

    //Relación uno a muchos
    // public function lugares()
    // {
    //     return $this->hasMany('App\Models\Poliza');
    // }
    public function polizas()
    {
        return $this->hasMany('App\Models\Poliza');
    }
}

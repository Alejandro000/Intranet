<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipospoliza extends Model
{
    use HasFactory;

    protected $fillable = ['tipo'];

    //Relación uno a muchos
    public function polizas()
    {
        return $this->hasOne('App\Models\Poliza');
    }
}

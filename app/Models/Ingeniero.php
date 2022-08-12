<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingeniero extends Model
{
    use HasFactory;
    protected $fillable = ['ingeniero'];
    // protected $primaryKey = ['ingeniero_id'];

    //Relación uno a muchos
    // public function lugares()
    // {
    //     return $this->hasMany('App\Models\Lugare');
    // }
    public function polizas()
    {
        return $this->hasMany('App\Models\Poliza');
    }
}

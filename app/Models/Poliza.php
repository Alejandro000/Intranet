<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poliza extends Model
{
    use HasFactory;

    protected $fillable = ['poliza', 'folio', 'ingeniero_id', 'tipospoliza_id','cliente', 'paise_id', 'ciudad', 'ejecutivo_id', 'marca_id', 'modelo', 'numeroSerie', 'comentarios', 'pdf', 'fechaInicio', 'fechaFin'];

    //Relación uno a muchos (inversa)
    public function ingeniero()
    {
       // $user = User::find($this->user_id);

        return $this->belongsTo('App\Models\Ingeniero');
        
        // $p1 = 'App\Models\User'::find(1);

        // echo $p1->user->name;
    }

    public function tipospoliza()
    {
        return $this->belongsTo('App\Models\Tipospoliza');
    }
    
    public function marca()
    {
        return $this->belongsTo('App\Models\Marca');
    }

    public function paise()
    {
        return $this->belongsTo('App\Models\Paise');
    }

    public function ejecutivo()
    {
        return $this->belongsTo('App\Models\Ejecutivo');
    }
}

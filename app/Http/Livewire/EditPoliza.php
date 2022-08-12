<?php

namespace App\Http\Livewire;

use App\Models\Poliza;
use App\Models\Ingeniero;
use App\Models\Tipospoliza;
use App\Models\Marca;
use App\Models\Paise;
use App\Models\Ejecutivo;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditPoliza extends Component
{
    use WithFileUploads;
    public $open = false;
    public $poliza, $folio, $cliente, $tipo, $ingeniero, $paises, $ciudad, $agente, $marca, $modelo, $numeroSerie, $comentarios, $archivo, $fecIni, $fecFin, $identificador;

    protected $rules = [
        'poliza.folio' => 'required',
        'poliza.ingeniero_id.*' => 'required',
        'poliza.tipospoliza_id.*' => 'required',
        'poliza.cliente' => 'required',
        'poliza.paise_id.*' => 'required',
        'poliza.ciudad' => 'required',
        'poliza.ejecutivo_id.*' => 'required',
        'poliza.marca_id.*' => 'required',
        'poliza.modelo' => 'required',
        'poliza.numeroSerie' => 'required',
        // 'pdf'=> 'required|max:2048',
        'poliza.comentarios' => 'required',
        'poliza.fechaInicio.*' => 'required',
        'poliza.fechaFin.*' => 'required',
    ];
    
    public function mount(Poliza $poliza){
        $this->poliza = $poliza;

        $this->identificador = rand();
        // dd($poliza);
    }
    //Revisar el guardado de las imagenes, reestablecer la bases de datos
    //Diseño de la vista de polizas
    Public function save()
    {
        $this->validate();
        // $nameFile = $this->folio. '.' .$this->archivo->getClientOriginalExtension();
        // dd($nameFile);

        if ($this->archivo) {
            Storage::delete([$this->poliza->pdf]);
            $this->poliza->pdf = $this->archivo->store('public');
            // $this->poliza->pdf = $this->archivo->storeAs('public',$nameFile);
            // dd($nameFile);
        }

        $this->poliza->save();
        $this->reset(['open', 'archivo']);
        $this->identificador = rand();
        $this->emitTo('show-polizas','render');
        $this->emit('alert', 'La poliza se ha actualizado correctamente');
    }

    public function render()
    {
        $polizas = Poliza::latest('id')->get();  //principal, paginación de datos
        $ingenieros = Ingeniero::with('polizas')->get();
        $tipospolizas = Tipospoliza::with('polizas')->get();
        $marcas = Marca::with('polizas')->get();
        $paiss = Paise::with('polizas')->get();
        $ejecutivos = Ejecutivo::with('polizas')->get();
        return view('livewire.edit-poliza', compact('polizas', 'ingenieros', 'tipospolizas', 'marcas', 'paiss', 'ejecutivos'));
        // return dd(view('livewire.edit-poliza', compact('polizas', 'ingenieros', 'tipospolizas', 'marcas', 'paiss', 'ejecutivos')));
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Poliza;
use App\Models\Ingeniero;
use App\Models\Tipospoliza;
use App\Models\Marca;
use App\Models\Paise;
use App\Models\Ejecutivo;
use Livewire\WithFileUploads;

class CreatePoliza extends Component
{
    use WithFileUploads;

    public $open = false;
    public $folio, $cliente, $tipo, $ingeniero, $paises, $ciudad, $agente, $marca, $modelo, $numeroSerie, $comentarios, $archivo, $fecIni, $fecFin, $identificador;

    public function mount()
    {
        $this->identificador = rand();
    }
    // public $accion = "save";
    protected $rules = [
        'folio' => 'required|numeric',
        'ingeniero' => 'required',
        'tipo' => 'required',
        'cliente' => 'required',
        'paises' => 'required',
        'ciudad' => 'required',
        'agente' => 'required',
        'marca' => 'required',
        'modelo' => 'required',
        'numeroSerie' => 'required',
        'archivo'=> 'required|max:2048',
        // 'archivo' => 'required', este es 'comentarios'
        'fecIni' => 'required',
        'fecFin' => 'required',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);   
    }

    public function save()
    {
        $this->validate();
        $nameFile = $this->folio. '.' .$this->archivo->getClientOriginalExtension();
        // $archivos = $this->archivo->storeAs('archivos', $nameFile, 'public_uploads');
        $archivos = $this->archivo->storeAs('public',$nameFile);
        Poliza::create([
            'folio' => $this->folio,
            'cliente' => $this->cliente,
            'tipospoliza_id' => $this->tipo,
            'ingeniero_id' => $this->ingeniero,
            'paise_id' => $this->paises,
            'ciudad' => $this->ciudad,
            'ejecutivo_id' => $this->agente,
            'marca_id' => $this->marca,
            'modelo' => $this->modelo,
            'numeroSerie' => $this->numeroSerie,
            'comentarios'=> $this->comentarios,
            'pdf'=> $archivos,
            'fechaInicio' => $this->fecIni,
            'fechaFin' => $this->fecFin
        ]);
        $this->reset(['open','folio', 'ingeniero', 'tipo', 'cliente', 'paises', 'ciudad', 'agente', 'marca', 'modelo', 'numeroSerie', 'comentarios', 'archivo', 'fecIni', 'fecFin']);
        $this->identificador = rand();
        $this->emitTo('show-polizas','render');
        // $this->emit('render');
        $this->emit('alert', 'La poliza se ha guardado correctamente');
    }

    public function default()
    {   
        $this->reset(['folio', 'ingeniero', 'tipo', 'cliente', 'paises', 'ciudad', 'agente', 'marca', 'modelo', 'numeroSerie', 'comentarios', 'archivo', 'fecIni', 'fecFin']);
    }
    
    public function render()
    {
        $polizas = Poliza::latest('id')->get();  //principal, paginación de datos
        $ingenieros = Ingeniero::with('polizas')->get();
        $tipospolizas = Tipospoliza::with('polizas')->get();
        $marcas = Marca::with('polizas')->get();
        $paiss = Paise::with('polizas')->get();
        $ejecutivos = Ejecutivo::with('polizas')->get();
        return view('livewire.create-poliza', compact('polizas', 'ingenieros', 'tipospolizas', 'marcas', 'paiss', 'ejecutivos'));
    }
}
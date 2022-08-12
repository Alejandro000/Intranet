<div>
    <x-jet-button wire:click="$set('open', true)">
        Crear poliza
    </x-jet-button>
    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Registrar nueva póliza
        </x-slot>
        <x-slot name="content">
            {{-- Folio de la poliza --}}
            <div class="mb-4">
                <x-jet-label value="Folio"/>
                <x-jet-input class="w-full" type="text" wire:model="folio"/>
                <x-jet-input-error for="folio"/>
            </div>
            {{-- Nombre del cliente --}}
            <div class="mb-4">
                <x-jet-label value="Cliente"/>
                <x-jet-input class="w-full" type="text" wire:model="cliente"/>
                <x-jet-input-error for="cliente"/>
            </div>
            {{-- Tipo de poliza --}}
            <div class="mb-4">
                <x-jet-label value="Tipo de poliza"/>
                <select name="tipo" class="form-control w-full" wire:model="tipo">
                <option selected>--Tipo de poliza--</option>
                    @foreach ($tipospolizas as $tipospoliza)
                        <option value="{{$tipospoliza->id}}">{{$tipospoliza->tipo}}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="tipo"/>
            </div>
            {{-- Ingeniero a cargo de la poliza --}}
            <div class="mb-4">
                <x-jet-label value="Ingeniero Asignado"/>
                <select name="ingeniero" class="form-control w-full" wire:model="ingeniero">
                <option selected>--Seleccione al ingeniero--</option>
                    @foreach ($ingenieros as $ingen)
                        <option value="{{$ingen->id}}">{{$ingen->ingeniero}}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="ingeniero"/>
            </div>
            {{-- Pais donde se encuentra el equipo asignado a la poliza --}}
            <div class="mb-4">
                <x-jet-label value="Pais"/>
                <select name="paises" class="form-control w-full" wire:model="paises">
                <option selected>--Seleccione el país--</option>
                    @foreach ($paiss as $paise)
                        <option value="{{$paise->id}}">{{$paise->paises}}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="paises"/>
            </div>
            {{-- Ciudad donde se encuentra el equipo asignado a la poliza --}}
            <div class="mb-4">
                <x-jet-label value="Ciudad"/>
                <x-jet-input class="w-full" type="text" wire:model="ciudad"/>
                <x-jet-input-error for="ciudad"/>
            </div>
            {{-- Ejecutivo que vendió la poliza --}}
            <div class="mb-4">
                <x-jet-label value="Ejecutivo asignado"/>
                <select name="agente" class="form-control w-full" wire:model="agente">
                <option selected>--Seleccione al ejecutivo responsable--</option>
                    @foreach ($ejecutivos as $ejecutivo)
                        <option value="{{$ejecutivo->id}}">{{$ejecutivo->agente}}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="agente"/>
            </div>
            {{-- Marca del equipo asignado a la poliza --}}
            <div class="mb-4">
                <x-jet-label value="Marca"/>
                <select name="marca" class="form-control w-full" wire:model="marca">
                <option selected>--Seleccione la marca--</option>
                    @foreach ($marcas as $marca)
                        <option value="{{$marca->id}}">{{$marca->marca}}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="marca"/>
            </div>
            {{-- Modelo del equipo asignado a la poliza --}}
            <div class="mb-4">
                <x-jet-label value="Modelo"/>
                <x-jet-input class="w-full" type="text" wire:model="modelo"/>
                <x-jet-input-error for="modelo"/>
            </div>
            {{-- Número de serie asignado a la poliza --}}
            <div class="mb-4">
                <x-jet-label value="Número de serie"/>
                <x-jet-input class="w-full" type="text" wire:model="numeroSerie"/>
                <x-jet-input-error for="numeroSerie"/>
            </div>
            {{-- Comentarios sobre la poliza --}}
            <div class="mb-4">
                <x-jet-label value="Comentarios"/>
                <textarea class="form-control w-full" rows="6" wire:model="comentarios"></textarea>
            </div>
            {{-- Documento adjuntado --}}
            <div class="mb-4">
                <form wire:submit.prevent="save">              
                    <x-jet-label value="Documento firmado"/>
                    <input class="w-full" type="file" wire:model="archivo" id="{{$identificador}}"/>
                    <x-jet-input-error for="archivo"/>                
                </form>
            </div>
            {{-- Mostrar previsualización del PDF --}}
            @if ($archivo)
                <iframe class="w-full" src="{{$archivo->temporaryUrl()}}"></iframe>
                {{-- <img src="{{$archivo->temporaryUrl()}}"> --}}
                {{-- <a target="_blank" href="{{$archivo->temporaryUrl()}}"></a> --}}
            @endif
            {{-- Fecha inicial de la poliza --}}
            <div class="mb-4">
                <x-jet-label value="Fecha de inicio"/>
                <input class="form-control w-full" type="date" wire:model="fecIni"/>
                <x-jet-input-error for="fecIni"/>
            </div>
            {{-- Fecha final de la poliza --}}
            <div class="mb-4">
                <x-jet-label value="Fecha final"/>
                <input class="form-control w-full" type="date" wire:model="fecFin"/>
                <x-jet-input-error for="fecFin"/>
            </div>
        </x-slot>
        <x-slot name="footer">
            {{-- Botón para cerrar el modal y eliminar lo que se ingresó --}}
            <span wire:click="default">
                <x-jet-secondary-button class="mr-4" wire:click="$set('open', false)">
                    Cancelar
                </x-jet-secondary-button>
            </span>
            {{-- Boton para guardar en la base de datos la información ingresada --}}
            <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save" class="disabled:opacity-25">
                Crear Poliza
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>

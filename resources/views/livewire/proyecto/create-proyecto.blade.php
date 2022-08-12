<div>
    <x-jet-button wire:click="$set('open', true)">
        Registrar proyecto
    </x-jet-button>
    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Ingresar nuevo proyecto
        </x-slot>
        <x-slot name="content">
            {{-- Agente del proyecto --}}
            <div class="mb-4">
                <x-jet-label value="Agente"/>
                <select name="agente" class="form-control w-full" wire:model="agente">
                <option selected>--Seleccione al ejecutivo responsable--</option>
                    @foreach ($ejecutivos as $ejecutivo)
                        <option value="{{$ejecutivo->id}}">{{$ejecutivo->agente}}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="agente"/>
            </div>
            {{-- Integrador del proyecto --}}
            <div class="mb-4">
                <x-jet-label value="Integrador"/>
                <x-jet-input class="w-full" type="text" wire:model="integrador"/>
                <x-jet-input-error for="cliente"/>
            </div>
            {{-- Cliente Final del proyecto --}}
            <div class="mb-4">
                <x-jet-label value="Cliente"/>
                <x-jet-input class="w-full" type="text" wire:model="cliente"/>
                {{-- <select name="tipo" class="form-control w-full" wire:model="cliente">
                <option selected>--Tipo de poliza--</option>
                    @foreach ($tipospolizas as $tipospoliza)
                        <option value="{{$tipospoliza->id}}">{{$tipospoliza->tipo}}</option>
                    @endforeach
                </select> --}}
                <x-jet-input-error for="cliente"/>
            </div>
            {{-- Marca de los dispositivos para el proyecto --}}
            <div class="mb-4">
                <x-jet-label value="Marca"/>
                <select name="ingeniero" class="form-control w-full" wire:model="marca">
                <option selected>--Seleccione la marca--</option>
                    @foreach ($marcas as $marca)
                        <option value="{{$marca->id}}">{{$marca->marca}}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="ingeniero"/>
            </div>
            {{-- Productos de los dispositivos para el proyecto --}}
            <div class="mb-4">
                <x-jet-label value="Productos"/>
                <x-jet-input class="w-full" type="text" wire:model="productos"/>
                <x-jet-input-error for="productos"/>
            </div>
            {{-- Subtotal del proyecto --}}
            <div class="mb-4">
                <x-jet-label value="Subtotal"/>
                <x-jet-input class="w-full" type="text" wire:model="subtotal"/>
                <x-jet-input-error for="subtotal"/>
            </div>
            {{-- Status del proyecto --}}
            <div class="mb-4">
                <x-jet-label value="Estado"/>
                <select name="estado" class="form-control w-full" wire:model="estado">
                <option selected>--Seleccione el estado del proyecto--</option>
                    @foreach ($estados as $estado)
                        <option value="{{$estado->id}}">{{$estado->estado}}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="agente"/>
            </div>
            {{-- Fecha de cierre del proyecto --}}
            <div class="mb-4">
                <x-jet-label value="Fecha de cierre"/>
                <input class="form-control w-full" type="date" wire:model="fecCierre"/>
                <x-jet-input-error for="fecCierre"/>
            </div>
            {{-- Comentarios del proyecto --}}
            <div class="mb-4">
                <x-jet-label value="Comentarios"/>
                <textarea class="form-control w-full" rows="6" wire:model="comentarios"></textarea>
            </div>
            {{-- Ingeniero preventa asignado a la poliza --}}
            <div class="mb-4">
                <x-jet-label value="Ingeniero Preventa"/>
                <select name="ingeniero" class="form-control w-full" wire:model="ingeniero">
                <option selected>--Seleccione al ingeniero de preventa--</option>
                    @foreach ($ingenieros as $ingeniero)
                        <option value="{{$ingeniero->id}}">{{$ingeniero->ingeniero}}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="ingeniero"/>
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
                Ingresar proyecto
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>

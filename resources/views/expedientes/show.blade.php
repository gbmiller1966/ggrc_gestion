<x-layout>
    <x-slot:heading>
        Expediente
    </x-slot:heading>
    <h1 class="font-bold text-lg">Título: {{ $expediente['titulo']}}</h1>
    <h2>Expediente: {{ $expediente['num_expte']}}</h2>
    <h2>Región: {{ $expediente->region->region}} - Provincia: {{ $expediente->provincia->provincia}} - Localidad: {{ $expediente->localidad->localidad}}</h2>
    <h2>Proveedor: {{ $expediente->proveedor->razon}} 
        - Contacto: {{ $expediente->proveedor->apellido}} 
        - Cel:  <a href="https://wa.me/{{ $expediente->proveedor->celular}}" target="_blank" aria-label="WhatsApp">
                    {{ $expediente->proveedor->celular}}
                </a>
        - Email: <a href="mailto:{{ $expediente->proveedor->email}}">{{ $expediente->proveedor->email}}</h2></a>
</x-layout>
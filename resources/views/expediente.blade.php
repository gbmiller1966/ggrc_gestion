<x-layout>
    <x-slot:heading>
        Expediente
    </x-slot:heading>
    <h1 class="font-bold text-lg">Título: {{ $expediente['titulo']}}</h1>
    <h2>Expediente: {{ $expediente['num_expte']}}</h2>
    <h2>Región: {{ $expediente->region->nombre}}</h2>
    <h2>Provincia: {{ $expediente->provincia->nombre}}</h2>
</x-layout>
<x-layout>
    <x-slot:heading>
        Expedientes
    </x-slot:heading>
    <ul>
        @foreach ( $expedientes as $expediente)
            <a href="/expedientes/{{ $expediente['id']}}" class="text-blue-500 hover:underline">
                <li> <strong> {{ $expediente['numero']}} </strong> - {{ $expediente['titulo']}} - {{ $expediente->provincia->nombre}}</li>
            </a>
        @endforeach
    </ul>
</x-layout>
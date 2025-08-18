<x-layout>
    <x-slot:heading>
        Expedientes
    </x-slot:heading>
        <div class="text-right mb-4">
        <a href="/expedientes/create">
            <button class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                ➕ Agregar expediente
            </button>
        </a>
    </div>
    <ul>
        @foreach ( $expedientes as $expediente)
            <a href="/expedientes/{{ $expediente['id']}}" class="text-blue-500 hover:underline">
                <li> <strong> {{ $expediente['num_expte']}} </strong> - {{ $expediente['titulo']}} - {{ $expediente->provincia->provincia}}</li>
            </a>
        @endforeach
    </ul>
</x-layout>
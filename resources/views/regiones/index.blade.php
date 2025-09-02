<x-layout>
    <x-slot:heading>
        Gestión de Regiones
    </x-slot:heading>
    <div class="flex justify-end">
        <a href="/regiones/create">
            <button class="flex justify-right rounded-md bg-blue-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-blue-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                <i class="bi bi-plus"> Agregar</i>
            </button>
        </a>
    </div>
    <table class="min-w-full divide-y divide-gray-200 border border-gray-300 rounded-md">
    <thead class="bg-gray-100">
        <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">ID</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Región</th>
            <th class="px-6 py-3 text-center text-xs font-medium text-gray-700 uppercase tracking-wider" colspan="2">Acciones</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach($regiones as $region)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $region->id }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $region->region }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    <a href="/regiones/{{ $region->id }}/edit">
                        <button class="flex w-full justify-center rounded-md bg-yellow-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-yellow-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-yellow-600">
                            <i class="bi bi-pencil"> Editar</i>
                        </button>
                    </a>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    <form action="/regiones/{{ $region->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="flex w-full justify-center rounded-md bg-red-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-red-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">
                            <i class="bi bi-trash"> Eliminar</i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>

</x-layout>

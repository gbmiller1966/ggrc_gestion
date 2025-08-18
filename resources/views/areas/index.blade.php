<x-layout>
    <x-slot:heading>
        Gestión de Áreas
    </x-slot:heading>
    <div class="text-right mb-4">
        <a href="/areas/create">
            <button class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                ➕ Agregar Área
            </button>
        </a>
    </div>
    <table class="min-w-full divide-y divide-gray-200 border border-gray-300 rounded-md">
    <thead class="bg-gray-100">
        <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">ID</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Área</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Dirección</th>
            <th class="px-6 py-3 text-center text-xs font-medium text-gray-700 uppercase tracking-wider" colspan="2">Acciones</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach($areas as $area)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $area->id }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $area->area }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $area->direccion->direccion }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    <button class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                        ✏️ Editar
                    </button>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    <button class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                        🗑️ Eliminar
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>

</x-layout>

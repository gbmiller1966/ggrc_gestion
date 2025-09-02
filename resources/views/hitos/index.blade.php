<x-layout>
    <x-slot:heading>
        Hitos del expediente
    </x-slot:heading>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="p-4">
            <h1 class="font-bold text-lg">Título: {{ $expediente['titulo']}}</h1>
            <h2><strong>Expediente: </strong>{{ $expediente['num_expte']}}</h2>
        </div>
        <div class="p-4">
            <div class="text-right mb-4">
                <a href="/hitos/create/{{ $expediente['id']}}">
                    <button class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <i class="bi bi-plus"></i> Agregar hito
                    </button>
                </a>
            </div>
        </div>
    </div>
    <table class="min-w-full divide-y divide-gray-200 border border-gray-300 rounded-md">
    <thead class="bg-gray-100">
        <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Hito</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Fecha</th>
            <th class="px-6 py-3 text-center text-xs font-medium text-gray-700 uppercase tracking-wider" colspan="2">Acciones</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach($hitos as $hito)
            <tr>
                <td class="px-6 py-4 whitespace-wrap text-sm text-gray-900">{{ $hito->hito }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $hito->created_at }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    <button class="px-7 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                        <i class="bi bi-pencil"></i> Editar Hito
                    </button>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    <button class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                        <i class="bi bi-trash"></i> Eliminar
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>

</x-layout>

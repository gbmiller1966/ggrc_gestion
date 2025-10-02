<x-layout>
    <x-slot:heading>
        Gestión de Tipos de Contratos
    </x-slot:heading>
    <div class="flex justify-end">
        <a href="/tipos/create">
            <button class="flex justify-right rounded-md mb-1 bg-blue-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-blue-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                <i class="bi bi-plus"> Agregar</i>
            </button>
        </a>
    </div>
    <div class="flex items-center justify-center">
    <table class="table-fixed w-3/4 divide-y divide-gray-200 border border-gray-300 rounded-md">
    <thead class="bg-gray-100">
        <tr>
            <th class="w-1/4 px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">ID</th>
            <th class="w-1/2 px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Tipo de contrato</th>
            <th class="w-1/4 px-6 py-3 text-center text-xs font-medium text-gray-700 uppercase tracking-wider" colspan="2">Acciones</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach($tipos as $tipo)
            <tr>
                <td class="w-1/4 px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $tipo->id }}</td>
                <td class="w-1/2 px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $tipo->tipo }}</td>
                <td class="w-1/4 px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    <button class="flex justify-end rounded-md bg-yellow-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-yellow-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-yellow-600">
                        <i class="bi bi-pencil"> Editar</i>
                    </button>
                </td>
                <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-900">
                    <form action="/tipos/{{ $tipo->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="flex justify-end rounded-md bg-red-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-red-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">
                            <i class="bi bi-trash"> Eliminar</i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>
    </div>
</x-layout>

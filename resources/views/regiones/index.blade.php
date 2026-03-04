<x-layout>
    <x-slot:heading>
        Gestión de Regiones
    </x-slot:heading>
    <div class="flex justify-center mb-4">
        <x-btn-agregar href="/regiones/create"></x-btn-agregar>
{{--         <a href="/regiones/create">
            <button class="flex justify-right rounded-md mb-1 bg-blue-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-blue-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                <i class="bi bi-plus"> Agregar</i>
            </button>
        </a> --}}
    </div>
    <div class="flex items-center justify-center">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="w-1/4 px-3 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">ID</th>
                        <th class="w-1/2 px-3 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Región</th>
                        <th class="w-1/4 px-3 py-3 text-center text-xs font-medium text-gray-700 uppercase tracking-wider" colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($regiones as $region)
                        <tr>
                            <td class="w-1/4 px-3 py-3 whitespace-nowrap text-sm text-gray-900">{{ $region->id }}</td>
                            <td class="w-1/2 px-3 py-3 whitespace-nowrap text-sm text-gray-900">{{ $region->region }}</td>
                            <td class="w-1/4 px-3 py-3 whitespace-nowrap text-sm text-gray-900">
                                <x-btn-editar href="/regiones/{{ $region->id }}/edit"></x-btn-editar>
                            </td>
                            <td class="w-1/4 px-2 py-4 whitespace-nowrap text-sm text-gray-900">
                                <form action="/regiones/{{ $region->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <x-btn-eliminar onclick="return confirm('¿Está seguro de que desea eliminar esta región? Esta acción no se puede deshacer.')"></x-btn-eliminar>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>

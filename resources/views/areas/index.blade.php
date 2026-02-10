<x-layout>
    <x-slot:heading>
        Gestión de Áreas
    </x-slot:heading>
    <div class="flex justify-end">
        <x-btn-agregar href="/areas/create"></x-btn-agregar>
    </div>
    <div class="flex items-center justify-center">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="w-1/12 px-3 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">ID</th>
                        <th class="w-4/12 px-3 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Área</th>
                        <th class="w-3/12 px-3 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Dirección</th>
                        <th class="w-3/12 px-3 py-3 text-center text-xs font-medium text-gray-700 uppercase tracking-wider" colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($areas as $area)
                        <tr>
                            <td class="w-1/12 px-3 py-3 whitespace-nowrap text-sm text-gray-900">{{ $area->id }}</td>
                            <td class="w-4/12 px-3 py-3 whitespace-nowrap text-sm text-gray-900">{{ $area->area }}</td>
                            <td class="w-3/12 px-3 py-3 whitespace-nowrap text-sm text-gray-900">{{ $area->direccion->direccion }}</td>
                            <td class="w-3/12 px-3 py-3 whitespace-nowrap text-sm text-gray-900">
                                <x-btn-editar href="/areas/{{ $area->id }}/edit"></x-btn-editar>
                            </td>
                            <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-900">
                                <form action="/areas/{{ $area->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <x-btn-eliminar type="submit" onclick="return confirm('¿Está seguro de que desea eliminar esta área? Esta acción no se puede deshacer.')"></x-btn-eliminar>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>

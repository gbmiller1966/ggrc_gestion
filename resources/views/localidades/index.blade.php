<x-layout>
    <x-slot:heading>
        Gestión de Localidades
    </x-slot:heading>
    <div class="flex justify-end">
        <x-btn-agregar href="/localidades/create"></x-btn-agregar>
    </div>
    <div class="flex items-center justify-center">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="w-1/8 px-3 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">ID</th>
                        <th class="w-2/8 px-3 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Localidad</th>
                        <th class="w-2/8 px-3 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Provincia</th>
                        <th class="w-3/8 px-3 py-3 text-center text-xs font-medium text-gray-700 uppercase tracking-wider" colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($localidades as $localidad)
                        <tr>
                            <td class="w-1/8 px-3 py-3 whitespace-nowrap text-sm text-gray-900">{{ $localidad->id }}</td>
                            <td class="w-2/8 px-3 py-3 whitespace-nowrap text-sm text-gray-900">{{ $localidad->localidad }}</td>
                            <td class="w-2/8 px-3 py-3 whitespace-nowrap text-sm text-gray-900">{{ $localidad->provincia->provincia }}</td>
                            <td class="w-3/8 px-3 py-3 whitespace-nowrap text-sm text-gray-900">
                                <x-btn-editar href="/localidades/{{ $localidad->id }}/edit"></x-btn-editar>
                            </td>
                            <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-900">
                                <form action="/localidades/{{ $localidad->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <x-btn-eliminar type="submit" onclick="return confirm('¿Está seguro de que desea eliminar esta localidad? Esta acción no se puede deshacer.')"></x-btn-eliminar>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="flex items-center justify-center pt-6">
        <div class="overflow-x-auto">
            {{ $localidades->appends(request()->except('page'))->links() }}
        </div>
    </div>
</x-layout>
<x-layout>
    <x-slot:heading>
        Gestión de Provincias
    </x-slot:heading>
    <div class="flex justify-end">
        <x-btn-agregar href="/provincias/create"></x-btn-agregar>
    </div>
    <div class="flex items-center justify-center">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="w-1/4 px-3 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">ID</th>
                        <th class="w-2/4 px-3 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Provincia</th>
                        <th class="w-1/4 px-3 py-3 text-center text-xs font-medium text-gray-700 uppercase tracking-wider" colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($provincias as $provincia)
                        <tr>
                            <td class="w-1/4 px-3 py-3 whitespace-nowrap text-sm text-gray-900">{{ $provincia->id }}</td>
                            <td class="w-2/4 px-3 py-3 whitespace-nowrap text-sm text-gray-900">{{ $provincia->provincia }}</td>
                            <td class="w-1/4 px-3 py-3 whitespace-nowrap text-sm text-gray-900">
                                <x-btn-editar href="/provincias/{{ $provincia->id }}/edit"></x-btn-editar>
                            </td>
                            <td class="w-1/4 px-2 py-4 whitespace-nowrap text-sm text-gray-900">
                                <form action="/provincias/{{ $provincia->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <x-btn-eliminar type="submit" onclick="return confirm('¿Está seguro de que desea eliminar esta provincia? Esta acción no se puede deshacer.')"></x-btn-eliminar>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-layout>

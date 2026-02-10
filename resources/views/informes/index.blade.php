<x-layout>
    <x-slot:heading>
        Gestión de Informes
    </x-slot:heading>
    <div class="flex justify-end">
        <x-btn-agregar href="/informes/create"></x-btn-agregar>
    </div>
    <div class="flex items-center justify-center">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 border border-gray-300 rounded-md">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Informe</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-700 uppercase tracking-wider" colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($informes as $informe)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $informe->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $informe->informe }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                <x-btn-editar href="/informes/{{ $informe->id }}/edit"></x-btn-editar>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                <form action="/informes/{{ $informe->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <x-btn-eliminar type="submit" onclick="return confirm('¿Está seguro de que desea eliminar este informe? Esta acción no se puede deshacer.')"></x-btn-eliminar>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
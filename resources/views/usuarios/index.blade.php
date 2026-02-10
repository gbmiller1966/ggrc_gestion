<x-layout>
    <x-slot:heading>
        Gestión de Usuarios
    </x-slot:heading>
    <div class="flex justify-end">
        <x-btn-agregar href="/usuarios/create"></x-btn-agregar>
    </div>
    <div class="flex items-center justify-center">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="w-1/12 px-3 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">ID</th>
                        <th class="w-2/12 px-3 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Nombre</th>
                        <th class="w-2/12 px-3 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Apellido</th>
                        <th class="w-3/12 px-3 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Email</th>
                        <th class="w-2/12 px-3 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Celular</th>
                        <th class="w-2/12 px-3 py-3 text-center text-xs font-medium text-gray-700 uppercase tracking-wider" colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($usuarios as $usuario)
                        <tr>
                            <td class="w-1/12 px-3 py-3 whitespace-nowrap text-sm text-gray-900">{{ $usuario->id }}</td>
                            <td class="w-2/12 px-3 py-3 whitespace-nowrap text-sm text-gray-900">{{ $usuario->nombre }}</td>
                            <td class="w-2/12 px-3 py-3 whitespace-nowrap text-sm text-gray-900">{{ $usuario->apellido }}</td>
                            <td class="w-3/12 px-3 py-3 whitespace-nowrap text-sm text-gray-900">{{ $usuario->email }}</td>
                            <td class="w-2/12 px-3 py-3 whitespace-nowrap text-sm text-blue-900 hover:underline"><a href="https://wa.me/{{ $usuario->celular }}" target="_blank" class="hover:underline">{{ $usuario->celular }}</a></td>
                            <td class="w-1/12 px-3 py-3 whitespace-nowrap text-sm text-gray-900">
                                <x-btn-editar href="/usuarios/{{ $usuario->id }}/edit"></x-btn-editar>
                            </td>
                            <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-900">
                                <form action="/usuarios/{{ $usuario->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <x-btn-eliminar type="submit" onclick="return confirm('¿Está seguro de que desea eliminar este usuario? Esta acción no se puede deshacer.')"></x-btn-eliminar>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
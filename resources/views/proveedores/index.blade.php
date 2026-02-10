<x-layout>
    <x-slot:heading>
        Gestión de Proveedores
    </x-slot:heading>
    <div class="flex justify-end">
        <x-btn-agregar href="/proveedores/create"></x-btn-agregar>
    </div>
    <div class="flex items-center justify-center">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 border border-gray-300 rounded-md">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Razón Social</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Contacto</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Celular</th>
                        {{-- <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Provincia</th> --}}
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-700 uppercase tracking-wider" colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($proveedores as $proveedor)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-900 hover:underline"><a href="/proveedores/{{ $proveedor->id }}" class="text-blue-500 hover:underline"><strong> {{ $proveedor->razon }}</strong></a></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $proveedor->contacto }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-900 hover:underline"><a href="mailto:{{ $proveedor->email }}" target="_blank" class="text-blue-500 hover:underline"><strong>{{ $proveedor->email }}</strong></a></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-900 hover:underline"><a href="https://wa.me/{{ $proveedor->contacto_celular }}" target="_blank" class="text-blue-500 hover:underline"><strong>{{ $proveedor->contacto_celular }}</strong></a></td>
                            {{-- <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $proveedor->provincia->provincia }}</td> --}}
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                <x-btn-editar href="/proveedores/{{ $proveedor->id }}/edit"></x-btn-editar>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                <form action="/proveedores/{{ $proveedor->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <x-btn-eliminar type="submit" onclick="return confirm('¿Está seguro de que desea eliminar este proveedor? Esta acción no se puede deshacer.')"></x-btn-eliminar>
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
            {{ $proveedores->appends(request()->except('page'))->links() }}
        </div>
    </div>
</x-layout>

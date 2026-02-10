<x-layout>
    <x-slot:heading>
        Gestión de Contrapartes Provinciales
    </x-slot:heading>
    <div class="flex justify-end">
        <x-btn-agregar href="/contrapartes/create"></x-btn-agregar>
    </div>
    <div class="flex items-center justify-center">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 border border-gray-300 rounded-md">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Apellido</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Celular</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Provincia</th>
                        {{-- <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Dependencia</th> --}}
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-700 uppercase tracking-wider" colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($contrapartes as $contraparte)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-900 hover:underline"><a href="/contrapartes/{{ $contraparte->id }}" class="text-blue-500 hover:underline"><strong> {{ $contraparte->apellido }}</strong></a></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-900 hover:underline"><a href="mailto:{{ $contraparte->email }}" target="_blank" class="text-blue-500 hover:underline"><i class="bi bi-envelope"><strong> {{ $contraparte->email }}</strong></i></a></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-900 hover:underline"><a href="https://wa.me/{{ $contraparte->celular }}" target="_blank" class="text-blue-500 hover:underline"><i class="bi bi-whatsapp"><strong> {{ $contraparte->celular }}</strong></i></a></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $contraparte->provincia->provincia }}</td>
                            {{-- <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ \Illuminate\Support\Str::limit($  contraparte->dependencia, 30, '...') }}</td> --}}
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                <x-btn-editar href="/contrapartes/{{ $contraparte->id }}/edit"></x-btn-editar>
                            </td>               
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                <form action="/contrapartes/{{ $contraparte->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <x-btn-eliminar type="submit" onclick="return confirm('¿Está seguro de que desea eliminar esta contraparte? Esta acción no se puede deshacer.')"></x-btn-eliminar>
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
            {{ $contrapartes->appends(request()->except('page'))->links() }}
        </div>
    </div>
</x-layout>

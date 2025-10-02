<x-layout>
    <x-slot:heading>
        Expediente
    </x-slot:heading>
    <div class="grid grid-cols-1 md:grid-cols-[7fr_3fr] gap-4">
        <div class="p-4">
            <h1 class="p-1"><strong>Título: </strong>{{ $expediente['titulo']}}</h1>
            <h2 class="p-1"><strong>Objeto: </strong>{{ $expediente['objeto']}}</h2>
            <h2 class="p-1"><strong>Expediente: </strong>{{ $expediente['num_expte']}}</h2>
            <h2 class="p-1"><strong>Región: </strong>{{ $expediente->region->region}} - <strong>Provincia: </strong>{{ $expediente->provincia->provincia}} - <strong>Localidad: </strong>{{ $expediente->localidad->localidad}}</h2>
            <h2 class="p-1"><strong>Estado: </strong>{{ $expediente->estado->estado}} - <strong>Asignación Presupuestaria: </strong>{{ $expediente->asignacion->asignacion}} - <strong>Tipo de contrato: </strong>{{ $expediente->tipo->tipo}}</h2>
            <h2 class="p-1"><strong>Tema estratégico: </strong>{{ $expediente->tema->tema}} - <strong>Técnica/o: </strong>{{ $expediente->usuario->nombre}} {{ $expediente->usuario->apellido}}</h2>
        </div>
        <div class="p-4">
            <div class="text-right mb-4">
                <button class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                    <i class="bi bi-pencil"> Editar</i>
                </button>
                <a href="/hitos/{{ $expediente->id }}">
                    <button class="px-7 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                        <i class="bi bi-list"></i> Hitos
                    </button>
                </a>
            </div>
        </div>
    </div>

    <hr style="height: 5px; border-width: 0; color: blue; background-color: blue;" class="my-4">
    <h2><strong>Montos: </strong></h2>
    <table class="min-w-full divide-y divide-gray-200 border border-gray-300 rounded-md">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Solicitud</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Contrato</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">A cargo CFI</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Total</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ number_format($expediente->monto_solicitud, 0, ',', '.') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ number_format($expediente->monto_contrato, 0, ',', '.') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ number_format($expediente->monto_cargo_cfi, 0, ',', '.') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ number_format($expediente->monto_total_contrato, 0, ',', '.') }}</td>
        </tbody>
    </table>
    <hr style="height: 5px; border-width: 0; color: blue; background-color: blue;" class="my-4">
    <h2><strong>Proveedor: </strong></h2>
    <table class="min-w-full divide-y divide-gray-200 border border-gray-300 rounded-md">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Razon</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Contacto</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Celular</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Email</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Provincia</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-900 hover:underline"><a href="/proveedores/{{ $expediente->proveedor_id }}" class="text-blue-500 hover:underline"><strong> {{ $expediente->proveedor->razon }}</strong></a></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->proveedor->contacto }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-900 hover:underline"><a href="https://wa.me/{{ $expediente->proveedor->contacto_celular }}" target="_blank" class="text-blue-500 hover:underline"> <i class="bi bi-whatsapp"><strong> {{ $expediente->proveedor->contacto_celular }}</strong></i></a></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-900 hover:underline"><a href="mailto:{{ $expediente->proveedor->contacto_email}}" class="text-blue-500 hover:underline"><i class="bi bi-envelope"><strong> {{ $expediente->proveedor->contacto_email}}</strong></i></a></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->proveedor->provincia->provincia }}</td>
        </tbody>
    </table>
    <hr style="height: 5px; border-width: 0; color: blue; background-color: blue;" class="my-4">
    <h2><strong>Contraparte: </strong></h2>
    <table class="min-w-full divide-y divide-gray-200 border border-gray-300 rounded-md">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Contacto</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Celular</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Email</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Dependencia</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Provincia</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-900 hover:underline"><a href="/contrapartes/{{ $expediente->contraparte_id }}" class="text-blue-500 hover:underline"><strong> {{ $expediente->contraparte->apellido }}</strong></a></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-900 hover:underline"><a href="https://wa.me/{{ $expediente->contraparte->celular }}" class="text-blue-500 hover:underline" target="_blank"><i class="bi bi-whatsapp"><strong> {{ $expediente->contraparte->celular }}</strong></i></a></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-900 hover:underline"><a href="mailto:{{ $expediente->contraparte->email}}" class="text-blue-500 hover:underline"><i class="bi bi-envelope"><strong> {{ $expediente->contraparte->email}}</strong></i></h2></a></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->contraparte->dependencia }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->contraparte->provincia->provincia }}</td>
        </tbody>
    </table>
    <hr style="height: 5px; border-width: 0; color: blue; background-color: blue;" class="my-4">
    <h2><strong>Tiempos de Gestión: </strong></h2>
        <table class="min-w-full divide-y divide-gray-200 border border-gray-300 rounded-md bg-gray-100">
            <tr>
                <td class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">INGRESO AL CFI</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->fecha_ingreso_cfi?->format('d/m/Y') }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">-</td>
            </tr>
            <tr>
                <td class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">DERIVACIÓN AL ÁREA</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->fecha_derivacion_area?->format('d/m/Y') }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->tiempo_cfi_area }}</td>
            </tr>
            <tr>
                <td class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">DERIVACIÓN AL TÉCNICO</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->fecha_derivacion_tecnico?->format('d/m/Y') }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->tiempo_area_tecnico }}</td>
            </tr>
            <tr>
                <td class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">ELEVACIÓN TDRS</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->fecha_elevacion_tdrs?->format('d/m/Y') }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->tiempo_tecnico_elevacion_tdrs }}</td>
            </tr>
            <tr>
                <td class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">FIRMA ÁREA</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->fecha_firma_area?->format('d/m/Y') }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->tiempo_tecnico_area }}</td>
            </tr>
            <tr>
                <td class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">FIRMA DIRECCIÓN</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->fecha_firma_direccion?->format('d/m/Y') }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->tiempo_area_direccion }}</td>
            </tr>
            <tr>
                <td class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">DERIVACIÓN A COMPRAS</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->fecha_derivacion_compras?->format('d/m/Y') }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->tiempo_direccion_compras }}</td>
            </tr>
            <tr>    
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">FIRMA DEL CONTRATO</th>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->fecha_inicio_contrato?->format('d/m/Y') }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->tiempo_compras_contrato }}</td>
            </tr>
            <tr>
                <td>
                    <h2 class="p-2 text-blue-900"><strong>Tiempo total de gestión: {{ $expediente->tiempo_total_gestion }} días</strong></h2>
                </td>
            </tr>
    </table>

    <hr style="height: 5px; border-width: 0; color: blue; background-color: blue;" class="my-4">

    <h2><strong>Documentación: </strong></h2>
    <table class="min-w-full divide-y divide-gray-200 border border-gray-300 rounded-md">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Proveedor</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Dotación</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">TDRs</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->doc_proveedor }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->doc_dotacion }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->doc_tdrs }}</td>
        </tbody>
    </table>
        <hr style="height: 5px; border-width: 0; color: blue; background-color: blue;" class="my-4">
    <h2><strong>Observaciones: </strong></h2>
    <p class="mb-4">{{ $expediente->observaciones }}</p>

    <div class="flex justify-end">
        <a href="/expedientes">
            <button class="flex justify-right rounded-md mb-1 bg-blue-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-blue-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                <i class="bi bi-house"> Volver</i>
            </button>
        </a>
    </div>    

</x-layout>

{{--

    <h2><strong>Tiempos de Gestión: </strong></h2>
    <table class="min-w-full divide-y divide-gray-200 border border-gray-300 rounded-md">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">INGRESO CFI</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">CFI - ÁREA</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">ÁREA - TÉCNICO</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">TÉCNICO - TDRS</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">TDRS - AREA</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">TDRS - DIRECCIÓN</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">DIRECCIÓN - GESTIÓN</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">GESTIÓN - CONTRATO</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">TOTAL GESTION</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"> - </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->tiempo_cfi_area }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->tiempo_area_tecnico }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->tiempo_tecnico_elevacion_tdrs }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->tiempo_tecnico_area }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->tiempo_area_direccion }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->tiempo_direccion_compras }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->tiempo_compras_contrato }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->tiempo_total_gestion }}</td>
        </tbody>
    </table>
    
<h2><strong>Fechas de Gestión: </strong></h2>
    <table class="min-w-full divide-y divide-gray-200 border border-gray-300 rounded-md">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">CFI</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">ÁREA</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">TÉCNICO</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">TDRS</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">ÁREA</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">DIRECCIÓN</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">COMPRAS</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">CONTRATO</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
                <tr>  
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->fecha_ingreso_cfi->format('d/m/Y') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->fecha_derivacion_area->format('d/m/Y') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->fecha_derivacion_tecnico->format('d/m/Y') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->fecha_elevacion_tdrs->format('d/m/Y') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->fecha_firma_area->format('d/m/Y') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->fecha_firma_direccion->format('d/m/Y') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->fecha_derivacion_compras->format('d/m/Y') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $expediente->fecha_inicio_contrato->format('d/m/Y') }}</td>
                </tr>
        </tbody>
    </table> --}}
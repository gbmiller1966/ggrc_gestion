<x-layout>
    <x-slot:heading>
        Alta de Expediente
    </x-slot:heading>

<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img src="/img/logo.png" alt="Consejo Federal de Inversiones" class="mx-auto h-10 w-auto" />
    <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Ingrese los datos del expediente</h2>
  </div>

    <form action="/expedientes" method="POST" class="space-y-6">
        @csrf
        <div class="grid grid-cols-2 gap-4">
            <div class="bg-blue-200 p-4">
                <div>
                    <label for="titulo" class="block text-sm/6 font-medium text-gray-900">Título:</label>
                    <div class="mt-2">
                        <input id="titulo" type="text" name="titulo" required autocomplete="titulo" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                    </div>
                </div>
            </div>
            <div class="bg-blue-200 p-4">
                <div>
                    <label for="num_expte" class="block text-sm/6 font-medium text-gray-900">Número de expediente GDE:</label>
                    <div class="mt-2">
                        <input id="num_expte" type="text" name="num_expte" required autocomplete="num_expte" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                    </div> 
                </div>
            </div>
            <div class="bg-blue-200 p-4 col-span-2">
                <div>
                    <label for="objeto" class="block text-sm/6 font-medium text-gray-900">Objeto:</label>
                    <div class="mt-2">
                        <textarea id="objeto" name="objeto" required autocomplete="objeto" rows="3" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"></textarea>
                    </div>
                </div> 
            </div>
            <div class="bg-blue-200 p-4">
                <div>
                    <label for="fecha_ingreso_cfi" class="block text-sm/6 font-medium text-gray-900">Fecha de ingreso al CFI:</label>
                    <div class="mt-2">
                        <input id="fecha_ingreso_cfi" type="date" name="fecha_ingreso_cfi" required autocomplete="fecha_ingreso_cfi" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                    </div>
                </div>
            </div>

            <div class="bg-blue-200 p-4">
                <div>
                    <label for="fecha_derivacion_area" class="block text-sm/6 font-medium text-gray-900">Fecha de derivacion al Área:</label>
                    <div class="mt-2">
                        <input id="fecha_derivacion_area" type="date" name="fecha_derivacion_area" required autocomplete="fecha_derivacion_area" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                    </div>
                </div>
            </div>

            <div class="bg-blue-200 p-4">
                <div>
                    <label for="fecha_derivacion_tecnico" class="block text-sm/6 font-medium text-gray-900">Fecha de derivación al técnico:</label>
                    <div class="mt-2">
                        <input id="fecha_derivacion_tecnico" type="date" name="fecha_derivacion_tecnico" required autocomplete="fecha_derivacion_tecnico" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                    </div>
                </div>
            </div>

            <div class="bg-blue-200 p-4">
                <div>
                    <label for="fecha_elevacion_tdrs" class="block text-sm/6 font-medium text-gray-900">Fecha de elevación de TDRs:</label>
                    <div class="mt-2">
                        <input id="fecha_elevacion_tdrs" type="date" name="fecha_elevacion_tdrs" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-3 gap-4">
            <div class="bg-blue-200 p-4">
                <div>
                    <label for="fecha_firma_direccion" class="block text-sm/6 font-medium text-gray-900">Fecha firma de Dirección de TDRs:</label>
                    <div class="mt-2">
                        <input id="fecha_firma_direccion" type="date" name="fecha_firma_direccion" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                    </div>
                </div>
            </div>

            <div class="bg-blue-200 p-4">
                <div>
                    <label for="gde_firma_direccion" class="block text-sm/6 font-medium text-gray-900">GDE firma de Dirección de TDRs:</label>
                    <div class="mt-2">
                        <input id="gde_firma_direccion" type="text" name="gde_firma_direccion" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                    </div>
                </div>
            </div>

            <div class="bg-blue-200 p-4">
                <div>
                    <label for="fecha_derivacion_gestion" class="block text-sm/6 font-medium text-gray-900">Fecha de derivación a Gestión:</label>
                    <div class="mt-2">
                        <input id="fecha_derivacion_gestion" type="date" name="fecha_derivacion_gestion" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div class="bg-blue-200 p-4">
                <div>
                    <label for="fecha_inicio_contrato" class="block text-sm/6 font-medium text-gray-900">Fecha de inicio del contrato:</label>
                    <div class="mt-2">
                        <input id="fecha_inicio_contrato" type="date" name="fecha_inicio_contrato" required autocomplete="fecha_inicio_contrato" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                    </div>
                </div>
            </div>
            <div class="bg-blue-200 p-4">
                <div>
                    <label for="fecha_fin_contrato" class="block text-sm/6 font-medium text-gray-900">Fecha de fin del contrato:</label>
                    <div class="mt-2">
                        <input id="fecha_fin_contrato" type="date" name="fecha_fin_contrato" required autocomplete="fecha_fin_contrato" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-3 gap-4">
            <div class="bg-blue-200 p-4">
                <div>
                    <label for="monto_solicitud" class="block text-sm/6 font-medium text-gray-900">Monto solicitud:</label>
                    <div class="mt-2">
                        <input id="monto_solicitud" type="number" name="monto_solicitud" required autocomplete="monto_solicitud" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                    </div>
                </div>
            </div>
            <div class="bg-blue-200 p-4">
                <div>
                    <label for="monto_contrato" class="block text-sm/6 font-medium text-gray-900">Monto contrato:</label>
                    <div class="mt-2">
                        <input id="monto_contrato" type="number" name="monto_contrato" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                    </div>
                </div>
            </div>
            <div class="bg-blue-200 p-4">
                <div>
                    <label for="monto_cargo_cfi" class="block text-sm/6 font-medium text-gray-900">Monto a cargo del CFI:</label>
                    <div class="mt-2">
                        <input id="monto_cargo_cfi" type="number" name="monto_cargo_cfi" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div class="bg-blue-200 p-4">
                <div>
                    <label for="fecha_aprobacion_if" class="block text-sm/6 font-medium text-gray-900">Fecha aprobación Informe Final:</label>
                    <div class="mt-2">
                        <input id="fecha_aprobacion_if" type="date" name="fecha_aprobacion_if" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                    </div>
                </div>
            </div>
            <div class="bg-blue-200 p-4">
                <div>
                    <label for="gde_aprobacion_if" class="block text-sm/6 font-medium text-gray-900">GDE aprobación Informe Final:</label>
                    <div class="mt-2">
                        <input id="gde_aprobacion_if" type="text" name="gde_aprobacion_if" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div class="bg-blue-200 p-4">
                <div>
                    <label for="fecha_envio_biblioteca" class="block text-sm/6 font-medium text-gray-900">Fecha de evío a Biblioteca:</label>
                    <div class="mt-2">
                        <input id="fecha_envio_biblioteca" type="date" name="fecha_envio_biblioteca" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                    </div>
                </div>
            </div>
            <div class="bg-blue-200 p-4">
                <div>
                    <label for="gde_envio_biblioteca" class="block text-sm/6 font-medium text-gray-900">GDE envío a Biblioteca:</label>
                    <div class="mt-2">
                        <input id="gde_envio_biblioteca" type="text" name="gde_envio_biblioteca" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div class="bg-blue-200 p-4">
                <div>
                    <label for="fecha_envio_archivo" class="block text-sm/6 font-medium text-gray-900">Fecha de evío a Archivo:</label>
                    <div class="mt-2">
                        <input id="fecha_envio_archivo" type="date" name="fecha_envio_archivo" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                    </div>
                </div>
            </div>
            <div class="bg-blue-200 p-4">
                <div>
                    <label for="gde_envio_archivo" class="block text-sm/6 font-medium text-gray-900">GDE envío a Archivo:</label>
                    <div class="mt-2">
                        <input id="gde_envio_archivo" type="text" name="gde_envio_archivo" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                    </div>
                </div>
            </div>
        </div>

        
        <div class="grid grid-cols-3 gap-4">
            <div class="bg-blue-200 p-4">
                <div>
                    <label for="region_id" class="block text-sm/6 font-medium text-gray-900">Región:</label>
                    <div class="mt-2">
                        <select id="region_id" name="region_id" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                            <option value="" class="block text-sm/6 font-medium text-gray-900">-- Seleccione la region --</option>
                            @foreach($regiones as $region)
                                <option value="{{ $region->id }}">{{ $region->region }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="bg-blue-200 p-4">
                <div>
                    <label for="provincia_id" class="block text-sm/6 font-medium text-gray-900">Provincia:</label>
                    <div class="mt-2">
                        <select id="provincia_id" name="provincia_id" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                            <option value="" class="block text-sm/6 font-medium text-gray-900">-- Seleccione una provincia --</option>
                            @foreach($provincias as $provincia)
                                <option value="{{ $provincia->id }}">{{ $provincia->provincia }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="bg-blue-200 p-4">
                <div>
                    <label for="localidad_id" class="block text-sm/6 font-medium text-gray-900">Localidad:</label>
                    <div class="mt-2">
                        <select id="localidad_id" name="localidad_id" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                            <option value="" class="block text-sm/6 font-medium text-gray-900">-- Seleccione una localidad --</option>
                            @foreach($localidades as $localidad)
                                <option value="{{ $localidad->id }}">{{ $localidad->localidad }} {{ $localidad->provincia->provincia }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div class="bg-blue-200 p-4">
                <div>
                    <label for="contraparte_id" class="block text-sm/6 font-medium text-gray-900">Contraparte provincial:</label>
                    <div class="mt-2">
                        <select id="contraparte_id" name="contraparte_id" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                            <option value="" class="block text-sm/6 font-medium text-gray-900">-- Seleccione la contraparte --</option>
                            @foreach($contrapartes as $contraparte)
                                <option value="{{ $contraparte->id }}">{{ $contraparte->provincia->provincia}} - {{ $contraparte->nombre }} {{ $contraparte->apellido}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="bg-blue-200 p-4">
                <div>
                    <label for="proveedor_id" class="block text-sm/6 font-medium text-gray-900">Proveedor / Consultor:</label>
                    <div class="mt-2">
                        <select id="proveedor_id" name="proveedor_id" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                            <option value="" class="block text-sm/6 font-medium text-gray-900">-- Seleccione el proveedor --</option>
                            @foreach($proveedores as $proveedor)
                                <option value="{{ $proveedor->id }}">{{ $proveedor->razon }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>


        <div class="grid grid-cols-2 gap-4">
            <div class="bg-blue-200 p-4">
                <div>
                    <label for="asignacion_id" class="block text-sm/6 font-medium text-gray-900">Asignación presupuestaria:</label>
                    <div class="mt-2">
                        <select id="asignacion_id" name="asignacion_id" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                            <option value="" class="block text-sm/6 font-medium text-gray-900">-- Seleccione la asignacion --</option>
                            @foreach($asignaciones as $asignacion)
                                <option value="{{ $asignacion->id }}">{{ $asignacion->asignacion }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="bg-blue-200 p-4">
                <div>
                    <label for="tema_id" class="block text-sm/6 font-medium text-gray-900">Temática del contrato:</label>
                    <div class="mt-2">
                        <select id="tema_id" name="tema_id" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                            <option value="" class="block text-sm/6 font-medium text-gray-900">-- Seleccione el tema --</option>
                            @foreach($temas as $tema)
                                <option value="{{ $tema->id }}">{{ $tema->tema }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div class="bg-blue-200 p-4">
                <div>
                    <label for="tipo_id" class="block text-sm/6 font-medium text-gray-900">Tipo de contrato:</label>
                    <div class="mt-2">
                        <select id="tipo_id" name="tipo_id" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                            <option value="" class="block text-sm/6 font-medium text-gray-900">-- Seleccione el tipo de contrato --</option>
                            @foreach($tipos as $tipo)
                                <option value="{{ $tipo->id }}">{{ $tipo->tipo }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="bg-blue-200 p-4">
                <div>
                    <label for="estado_id" class="block text-sm/6 font-medium text-gray-900">Estado del contrato:</label>
                    <div class="mt-2">
                        <select id="estado_id" name="estado_id" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                            <option value="" class="block text-sm/6 font-medium text-gray-900">-- Seleccione el estado --</option>
                            @foreach($estados as $estado)
                                <option value="{{ $estado->id }}">{{ $estado->estado }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Enviar</button>
        </div>
    </form>

</div>


</x-layout>


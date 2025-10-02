<x-layout>
    <x-slot:heading>
        Gestión de Proveedores
    </x-slot:heading>

<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Ingrese el Proveedor</h2>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form action="/proveedores" method="POST" class="space-y-6">
        @csrf

        <div>
            <label for="razon" class="block text-sm/6 font-medium text-gray-900">Razón Social:</label>
            <div class="mt-2">
                <input id="razon" type="text" name="razon" required autocomplete="razon" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
            </div>
        </div>

        <div>
            <label for="cuit" class="block text-sm/6 font-medium text-gray-900">CUIT:</label>
            <div class="mt-2">
                <input id="cuit" type="text" name="cuit" required autocomplete="cuit" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
            </div>
        </div>

        <div>
            <label for="num_proveedor" class="block text-sm/6 font-medium text-gray-900">Número de proveedor:</label>
            <div class="mt-2">
                <input id="num_proveedor" type="text" name="num_proveedor" required autocomplete="num_proveedor" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
            </div>
        </div>

        <div>
            <label for="email" class="block text-sm/6 font-medium text-gray-900">Email:</label>
            <div class="mt-2">
                <input id="email" type="email" name="email" required autocomplete="email" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
            </div>
        </div>

        <div>
            <label for="tel" class="block text-sm/6 font-medium text-gray-900">Teléfono:</label>
            <div class="mt-2">
                <input id="tel" type="tel" name="tel" required autocomplete="tel" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
            </div>
        </div>

        <hr style="height: 5px; border-width: 0; color: blue; background-color: blue;" class="my-4">
        <h2><strong>Información del contacto: </strong></h2>

        <div>
            <label for="contacto" class="block text-sm/6 font-medium text-gray-900">Nombre y Apellido:</label>
            <div class="mt-2">
                <input id="contacto" type="text" name="contacto" required autocomplete="contacto" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
            </div>
        </div>

        <div>
            <label for="contacto_email" class="block text-sm/6 font-medium text-gray-900">Email:</label>
            <div class="mt-2">
                <input id="contacto_email" type="email" name="contacto_email" required autocomplete="contacto_email" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
            </div>
        </div>

        <div>
            <label for="contacto_celular" class="block text-sm/6 font-medium text-gray-900">Celular:</label>
            <div class="mt-2">
                <input id="contacto_celular" type="tel" name="contacto_celular" required autocomplete="contacto_celular" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
            </div>
        </div>

        <div>
            <select name="provincia_id" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                <option value="" class="block text-sm/6 font-medium text-gray-900">-- Seleccione la Provincia --</option>
                @foreach($provincias as $provincia)
                    <option value="{{ $provincia->id }}">{{ $provincia->provincia }}</option>
                @endforeach
            </select>
        </div>
        <div class="grid grid-cols-2 gap-2">
            <button type="submit" class="justify-center mt-1 rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                <i class="bi bi-save"> Guardar</i>
            </button>
            <button type="button" class="justify-center mt-1 rounded-md bg-red-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-red-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                <a href="/proveedores"><i class="bi bi-x-circle-fill"> Cancelar</i></a>
            </button>
        </div>
    </form>
  </div>
</div>


</x-layout>


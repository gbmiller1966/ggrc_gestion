<x-layout>
    <x-slot:heading>
        Gestión de Contrapartes Provinciales
    </x-slot:heading>

<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img src="/img/logo.png" alt="Consejo Federal de Inversiones" class="mx-auto h-10 w-auto" />
    <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Ingrese la Contraparte Provincial</h2>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form action="/contrapartes" method="POST" class="space-y-6">
        @csrf
        
        <div>
            <label for="nombre" class="block text-sm/6 font-medium text-gray-900">Nombre:</label>
            <div class="mt-2">
                <input id="nombre" type="text" name="nombre" required autocomplete="nombre" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
            </div>
        </div>

        <div>
            <label for="apellido" class="block text-sm/6 font-medium text-gray-900">Apellido:</label>
            <div class="mt-2">
                <input id="apellido" type="text" name="apellido" required autocomplete="apellido" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
            </div>
        </div>

        <div>
            <label for="email" class="block text-sm/6 font-medium text-gray-900">Email:</label>
            <div class="mt-2">
                <input id="email" type="email" name="email" required autocomplete="email" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
            </div>
        </div>

        <div>
            <label for="celular" class="block text-sm/6 font-medium text-gray-900">Celular:</label>
            <div class="mt-2">
                <input id="celular" type="tel" name="celular" required autocomplete="celular" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
            </div>
        </div>

        <div>
            <label for="dependencia" class="block text-sm/6 font-medium text-gray-900">Dependencia:</label>
            <div class="mt-2">
                <input id="dependencia" type="text" name="dependencia" required autocomplete="dependencia" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
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

        <div>
            <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Guardar</button>
        </div>
    </form>
  </div>
</div>


</x-layout>


<x-layout>
    <x-slot:heading>
        Gestión de provincias
    </x-slot:heading>

<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img src="/img/logo.png" alt="Consejo Federal de Inversiones" class="mx-auto h-10 w-auto" />
    <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Ingrese la provincia</h2>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form action="/provincias" method="POST" class="space-y-6">
        @csrf
        <div>
            <label for="provincia" class="block text-sm/6 font-medium text-gray-900">Provincia:</label>
            <div class="mt-2">
                <input id="provincia" type="text" name="provincia" required autocomplete="provincia" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
            </div>
        </div>

        <div>
            <select name="region_id" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                <option value="" class="block text-sm/6 font-medium text-gray-900">-- Seleccione la Región --</option>
                @foreach($regiones as $region)
                    <option value="{{ $region->id }}">{{ $region->region }}</option>
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


<x-layout>
    <x-slot:heading>
        Gestión de Estados del Expediente
    </x-slot:heading>

<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Ingrese un nuevo estado</h2>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form action="/estados" method="POST" class="space-y-6">
        @csrf
        <div>
            <label for="estado" class="block text-sm/6 font-medium text-gray-900">Estado:</label>
            <div class="mt-2">
                <input id="estado" type="text" name="estado" required autocomplete="estado" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
            </div>
        </div>
        <div class="grid grid-cols-2 gap-2">
            <button type="submit" class="justify-center mt-1 rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                <i class="bi bi-save"> Guardar</i>
            </button>
            <button type="button" class="justify-center mt-1 rounded-md bg-red-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-red-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                <a href="/estados"><i class="bi bi-x-circle-fill"> Cancelar</i></a>
            </button>
        </div>
    </form>
  </div>
</div>


</x-layout>


<x-layout>
    <x-slot:heading>
        Creación de hitos
    </x-slot:heading>

<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img src="/img/logo.png" alt="Consejo Federal de Inversiones" class="mx-auto h-10 w-auto" />
    <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Ingrese el hito</h2>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form action="/hitos" method="POST" class="space-y-6">
        @csrf
        <input type="hidden" name="expediente_id" value="{{ $expediente['id'] }}">
        <input type="hidden" name="fecha" value="{{ Date::now()->format('Y-m-d') }}">
        <div>
            <label for="hito" class="block text-sm/6 font-medium text-gray-900">Hito:</label>
            <textarea id="hito" name="hito" rows="3" required class="
              block
              w-full
              p-2.5
              text-gray-900
              border
              border-gray-300
              rounded-lg
              bg-gray-50
              sm:text-md
              focus:ring-blue-500
              focus:border-blue-500
              dark:bg-gray-700
              dark:border-gray-600
              dark:placeholder-gray-400
              dark:text-white
              dark:focus:ring-blue-500
              dark:focus:border-blue-500"
              id="hito"
              name="hito"
              placeholder="Escribe tu hito aquí..."
              rows="4"></textarea>
        </div>

        <div>
            <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Guardar</button>
        </div>
    </form>
  </div>
</div>


</x-layout>


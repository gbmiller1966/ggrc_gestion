<x-layout>
    <x-slot:heading>
        Edición Región: {{ $region->region }}
    </x-slot:heading>

<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img src="/img/logo.png" alt="Consejo Federal de Inversiones" class="mx-auto h-10 w-auto" />
    <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Modifique el nombre de la región</h2>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form action="/regiones/{{ $region->id }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label for="region" class="block text-sm/6 font-medium text-gray-900">Región:</label>
            <div class="mt-2">
                <input id="region" type="text" name="region" autocomplete="region" value="{{ $region->region }}" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
            </div>
            @error('region')
              <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
            @enderror

        </div>
{{--    @if ($errors->any())
            <div class="mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-red-500 text-xs">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}

        <div class="grid grid-cols-2 gap-2">
            <button type="submit" class="justify-center mt-1 rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                <i class="bi bi-arrow-repeat"> Modificar</i>
            </button>
            <button type="button" class="justify-center mt-1 rounded-md bg-red-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-red-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                <a href="/regiones"><i class="bi bi-x-circle-fill"> Cancelar</i></a>
            </button>
        </div>
    </form>
  </div>
</div>


</x-layout>


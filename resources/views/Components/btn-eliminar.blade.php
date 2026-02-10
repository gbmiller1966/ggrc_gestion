<button {{$attributes->merge(['type' => 'submit','class' => 'w-[40px] flex justify-right rounded-md mb-1 bg-red-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-red-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600'])}}>
    <i class="bi bi-trash"> {{$slot}}</i>
</button>
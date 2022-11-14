<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $products->product_name }}
        </h2>
    </x-slot>

@if ($errors->any())
    <div class="w-4/5 m-auto">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="w-1/5 mb-4 text-gray-50 bg-red-700 rounded-2xl py-4">
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif

<div class="w-4/5 m-auto pt-20">
    <form 
        action="{{ route('product.voorraad') }}"
        method="POST"
        enctype="multipart/form-data">
        @csrf
        <div class="sm:grid grid-cols-2 gap-10 w-3/6 mx-6 py-13 border-b border-gray-200">
            <div>
                <img src="{{ asset('images/' . $products->image_path) }}" alt="">
            </div>
        </div>
        <br>
        <span class="text-gray-500">
            Hoeveelheid in magazijn:<span class="font-bold roboto text-gray-800">{{ $products->amount }}
        </span>
        <input 
            name="amount"
            placeholder="Hoeveelheid erbij..."
            type="number" 
            class="mb-8 bg-transparent block border-b-2 w-full h-10 text-xl outline-none mt-10"></input>    
        <button    
            type="submit"
            class="uppercase mt-15 bg-yellow-400 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
            Submit 
        </button>
    </form>
</div>
</x-app-layout>

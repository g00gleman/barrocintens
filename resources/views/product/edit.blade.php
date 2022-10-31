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
        action="{{ route('product.edit') }}"
        method="POST"
        enctype="multipart/form-data">
        @csrf

        <input 
            name="name"
            value="{{ $products->name }}"
            class="bg-transparent block border-b-2 w-full h-20 text-6xl outline-none">
         <input 
            name="price"
            value="{{ $products->price }}"
            class="mb-8 bg-transparent block border-b-2 w-full h-10 text-xl outline-none"></input>
        <input 
            name="brand"
            value="{{ $products->brand }}"
            class="mb-8 bg-transparent block border-b-2 w-full h-10 text-xl outline-none"></input>
        <input 
            name="description"
            value="{{ $products->description }}"
            class="py-20 bg-transparent block border-b-2 w-full h-60 text-xl outline-none"></input> 

        <button    
            type="submit"
            class="uppercase mt-15 bg-yellow-400 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
            Submit 
        </button>
    </form>
</div>
</x-app-layout>

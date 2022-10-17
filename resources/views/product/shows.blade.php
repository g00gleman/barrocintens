<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="w-4/5 m-auto pt-20">
    <div class="sm:grid grid-cols-2 gap-10 w-3/6 mx-6 py-13 border-b border-gray-200">
        <div>
            <img src="{{ asset('images/' . $products->image_path) }}" alt="">
        </div>
    </div>

    <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
        {{ $products->description }}
    </p>
    <a
        href="/contact"
        class="uppercase mt-15 bg-yellow-400 text-gray-100 text-lg font-extrabold py-3 px-5 rounded-2xl">
        Offerte
    </a>    
</div>
</x-guest-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $products->name }}
        </h2>
    </x-slot>
    <div class="w-4/5 m-auto pt-20">
    <div class="sm:grid grid-cols-2 gap-10 w-3/6 mx-6 py-13 border-b border-gray-200">
        <div>
            <img src="{{ asset('images/' . $products->image_path) }}" alt="">
        </div>
    </div>
    <span class="text-gray-500">
        Price: €<span class="font-bold italic text-gray-800">{{ $products->price }}
    </span>

    <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
        {{ $products->description }}
    </p>
</div>
</x-app-layout>
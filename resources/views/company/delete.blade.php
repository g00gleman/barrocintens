<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $products->name }}
        </h2>
    </x-slot>
    <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
        {{ $products->description }}
    </p>
    <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
        {{ $products->description }}
    </p>
    <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
        {{ $products->description }}
    </p>
    <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
        {{ $products->description }}
    </p>
    <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
        {{ $products->description }}
    </p>
</div>
</x-app-layout>
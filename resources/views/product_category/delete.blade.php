<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $products_categories->name }}
        </h2>
    </x-slot>

    <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
        {{ $products_categories->is_employee_only }}
    </p>
</div>
</x-app-layout>
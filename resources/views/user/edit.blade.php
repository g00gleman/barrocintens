<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $user->name }}
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
        action="{{ route('user.edit') }}"
        method="POST"
        enctype="multipart/form-data">
        @csrf

        <input 
            name="name"
            value="{{ $user->name }}"
            class="mb-8 bg-transparent block border-b-2 w-full h-10 text-xl outline-none"></input>
        <input 
            name="username"
            value="{{ $user->username }}"
            class="mb-8 bg-transparent block border-b-2 w-full h-10 text-xl outline-none"></input>
        <input 
            name="email"
            value="{{ $user->email }}"
            class="mb-8 bg-transparent block border-b-2 w-full h-10 text-xl outline-none"></input>
        <div class="grid grid-cols-12">
            <label for="Admin" class="col-span-2">Admin:</label>
            <input
                type="checkbox" 
                name="Admin"
                class="mb-8 bg-transparent block border-b-2 w-10 h-10 text-xl outline-none col-span-10"
                @if ($userrollen->admin == null)  @else checked @endif></input>
        </div>
        <div class="grid grid-cols-12">
            <label for="Headfinance" class="col-span-2">Head finance:</label>
            <input
                type="checkbox" 
                name="Headfinance"
                class="mb-8 bg-transparent block border-b-2 w-10 h-10 text-xl outline-none col-span-10"
                @if ($userrollen->head_finance == null)  @else checked @endif></input>
        </div>
        <div class="grid grid-cols-12">
            <label for="Finance" class="col-span-2">Finance:</label>
            <input
                type="checkbox" 
                name="Finance"
                class="mb-8 bg-transparent block border-b-2 w-10 h-10 text-xl outline-none col-span-10"
                @if ($userrollen->finance == null)  @else checked @endif></input>
        </div>
        <div class="grid grid-cols-12">
            <label for="Headmaintenance" class="col-span-2">Head maintenance:</label>
            <input
                type="checkbox" 
                name="Headmaintenance"
                class="mb-8 bg-transparent block border-b-2 w-10 h-10 text-xl outline-none col-span-10"
                @if ($userrollen->head_maintenance == null)  @else checked @endif></input>
        </div>
        <div class="grid grid-cols-12">
            <label for="Maintenance" class="col-span-2">Maintenance:</label>
            <input
                type="checkbox" 
                name="Maintenance"
                class="mb-8 bg-transparent block border-b-2 w-10 h-10 text-xl outline-none col-span-10"
                @if ($userrollen->maintenance == null)  @else checked @endif></input>
        </div>
        <div class="grid grid-cols-12">
            <label for="Headsales" class="col-span-2">Head sales:</label>
            <input
                type="checkbox" 
                name="Headsales"
                class="mb-8 bg-transparent block border-b-2 w-10 h-10 text-xl outline-none col-span-10"
                @if ($userrollen->head_sales == null)  @else checked @endif></input>
        </div>
        <div class="grid grid-cols-12">
            <label for="Sales" class="col-span-2">Sales:</label>
            <input
                type="checkbox" 
                name="Sales"
                class="mb-8 bg-transparent block border-b-2 w-10 h-10 text-xl outline-none col-span-10"
                @if ($userrollen->sales == null)  @else checked @endif></input>
        </div>
        <div class="grid grid-cols-12">
            <label for="Headinkoop" class="col-span-2">Head inkoop:</label>
            <input
                type="checkbox" 
                name="Headinkoop"
                class="mb-8 bg-transparent block border-b-2 w-10 h-10 text-xl outline-none col-span-10"
                @if ($userrollen->head_inkoop == null)  @else checked @endif></input>
        </div>
        <div class="grid grid-cols-12">
            <label for="Inkoop" class="col-span-2">Inkoop:</label>
            <input
                type="checkbox" 
                name="Inkoop"
                class="mb-8 bg-transparent block border-b-2 w-10 h-10 text-xl outline-none col-span-10"
                @if ($userrollen->inkoop == null)  @else checked @endif></input>
        </div>
        <div class="grid grid-cols-12">
            <label for="Klant" class="col-span-2">Klant:</label>
            <input
                type="checkbox" 
                name="Klant"
                value="1"
                class="mb-8 bg-transparent block border-b-2 w-10 h-10 text-xl outline-none col-span-10"
                @if ($userrollen->klant == null)  @else checked @endif></input>
        </div>
        <button    
            type="submit"
            class="uppercase mt-15 bg-yellow-400 text-gray-100 text-lg font-extrabold py-3 px-5 rounded-2xl">
            Submit
        </button>
    </form>
</div>
</x-app-layout>
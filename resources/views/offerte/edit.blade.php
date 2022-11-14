<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Offerte bewerken') }}
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
        action="{{ route('offerte.edit', ['offerteid' => $offerte->id]) }}"
        method="POST"
        enctype="multipart/form-data">
        @csrf

    <input 
        name="naam"
        value="{{ $offerte->naam }}"
        class="mb-8 bg-transparent block border-b-2 w-full h-10 text-xl outline-none"></input>
    <input 
        name="achternaam"
        value="{{ $offerte->achternaam }}"
        class="mb-8 bg-transparent block border-b-2 w-full h-10 text-xl outline-none"></input>
    <input 
        name="bedrijfnaam"
        value="{{ $offerte->bedrijfnaam }}"
        class="mb-8 bg-transparent block border-b-2 w-full h-10 text-xl outline-none"></input>
    <input 
        name="email"
        value="{{ $offerte->email }}"
        class="mb-8 bg-transparent block border-b-2 w-full h-10 text-xl outline-none"></input>
    <input 
        name="telefoonnummer"
        value="{{ $offerte->telefoonnummer }}"
        class="mb-8 bg-transparent block border-b-2 w-full h-10 text-xl outline-none"></input>
    <input 
        name="land"
        value="{{ $offerte->land }}"
        class="mb-8 bg-transparent block border-b-2 w-full h-10 text-xl outline-none"></input>
    <input 
        name="stad"
        value="{{ $offerte->stad }}"
        class="mb-8 bg-transparent block border-b-2 w-full h-10 text-xl outline-none"></input>
    <input 
        name="straat"
        value="{{ $offerte->straat }}"
        class="mb-8 bg-transparent block border-b-2 w-full h-10 text-xl outline-none"></input>
    <input 
        name="huisnummer"
        value="{{ $offerte->huisnummer }}"
        class="mb-8 bg-transparent block border-b-2 w-full h-10 text-xl outline-none"></input>

    <div class="grid grid-cols-12">
    <label for="check" class="col-span-2">check:</label>
    <input
        type="checkbox" 
        name="check"
        class="mb-8 bg-transparent block border-b-2 w-10 h-10 text-xl outline-none col-span-10" 
        @if ($offerte->check == null)  @else checked @endif></input>
    </div>
        </br>
        <button    
            type="submit"
            class="uppercase mt-15 bg-yellow-400 text-gray-100 text-lg font-extrabold py-3 px-5 rounded-2xl">
            Submit
        </button>
    </form>
</div>
</x-app-layout>
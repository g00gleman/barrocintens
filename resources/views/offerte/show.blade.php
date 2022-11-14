<style>
    .button {
  background-color: #32CD32;
  border: none;
  border-radius: 8px;
  color: white;
  padding: 8px 16px;
  text-align: center;
  font-size: 16px;
  margin: 4px 2px;
  opacity: 0.6;
  transition: 0.3s;
  display: inline-block;
  text-decoration: none;
  cursor: pointer;
}

.button:hover {opacity: 1}
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Offerte') }}
        </h2>
    </x-slot>

<div class="w-4/5 m-auto pt-20">
    <form 
        action="{{ route('offerte.show', ['offerteid' => $offerte->id]) }}"
        method="POST"
        enctype="multipart/form-data">
        @csrf

    <input 
        name="naam"
        value="{{ $offerte->naam }}"
        class="mb-8 bg-transparent block border-b-2 w-full h-10 text-xl outline-none"
        disabled></input>
    <input 
        name="achternaam"
        value="{{ $offerte->achternaam }}"
        class="mb-8 bg-transparent block border-b-2 w-full h-10 text-xl outline-none"
        disabled></input>
    <input 
        name="bedrijfnaam"
        value="{{ $offerte->bedrijfnaam }}"
        class="mb-8 bg-transparent block border-b-2 w-full h-10 text-xl outline-none"
        disabled></input>
    <input 
        name="email"
        value="{{ $offerte->email }}"
        class="mb-8 bg-transparent block border-b-2 w-full h-10 text-xl outline-none"
        disabled></input>
    <input 
        name="telefoonnummer"
        value="{{ $offerte->telefoonnummer }}"
        class="mb-8 bg-transparent block border-b-2 w-full h-10 text-xl outline-none"
        disabled></input>
    <input 
        name="land"
        value="{{ $offerte->land }}"
        class="mb-8 bg-transparent block border-b-2 w-full h-10 text-xl outline-none"
        disabled></input>
    <input 
        name="stad"
        value="{{ $offerte->stad }}"
        class="mb-8 bg-transparent block border-b-2 w-full h-10 text-xl outline-none"
        disabled></input>
    <input 
        name="straat"
        value="{{ $offerte->straat }}"
        class="mb-8 bg-transparent block border-b-2 w-full h-10 text-xl outline-none"
        disabled></input>
    <input 
        name="huisnummer"
        value="{{ $offerte->huisnummer }}"
        class="mb-8 bg-transparent block border-b-2 w-full h-10 text-xl outline-none"
        disabled></input>

    <div class="grid grid-cols-12">
    <label for="check" class="col-span-2">check:</label>
    <input
        type="checkbox" 
        name="check"
        class="mb-8 bg-transparent block border-b-2 w-10 h-10 text-xl outline-none col-span-10" 
        disabled
        @if ($offerte->check == null)  @else checked @endif></input>
    </div>
        </br>
        <a href="/offerte/overzicht" class="uppercase mt-15 bg-yellow-400 text-gray-100 text-lg font-extrabold py-3 px-5 rounded-2xl">Terug</a>
    </form>
</div>
</x-app-layout>
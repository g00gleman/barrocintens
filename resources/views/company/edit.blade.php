<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Bedrijf bewerken') }}
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
        action="{{ route('company.edit') }}"
        method="POST"
        enctype="multipart/form-data">
        @csrf

        <input 
            name="name"
            value="{{ $company->name }}"
            class="mb-8 bg-transparent block border-b-2 w-full h-10 text-xl outline-none"></input>
        <input 
            name="phone"
            value="{{ $company->phone }}"

            class="mb-8 bg-transparent block border-b-2 w-full h-10 text-xl outline-none"></input>
        <input 
            name="street"
            value="{{ $company->street }}"
            class="mb-8 bg-transparent block border-b-2 w-full h-10 text-xl outline-none"></input>
        <input 
            name="HouseNumber"
            value="{{ $company->HouseNumber }}"
            class="mb-8 bg-transparent block border-b-2 w-full h-10 text-xl outline-none"></input>
        <input 
            name="city"
            value="{{ $company->city }}"
            class="mb-8 bg-transparent block border-b-2 w-full h-10 text-xl outline-none"></input>
        <input 
            name="CountryCode"
            value="{{ $company->CountryCode }}"
            class="mb-8 bg-transparent block border-b-2 w-full h-10 text-xl outline-none"></input>
            <div class="grid grid-cols-12">
            <label for="bkr" class="col-span-2">BKR check:</label>
            <input
                type="checkbox" 
                name="bkr"
                class="mb-8 bg-transparent block border-b-2 w-10 h-10 text-xl outline-none col-span-10" 
                @if ($company->BkrCheckedAt == null)  @else checked @endif></input>
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
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create user
        </h2>
    </x-slot>

@if ($errors->any())
    <div class="mt-2 w-4/5 m-auto">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-center w-1/5 mb-4 text-gray-50 bg-red-700 rounded-2xl py-4">
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif

<div class="w-4/5 m-auto pt-20">
    <form 
    action="{{ route('user.create') }}" 
    method="POST"
    enctype="multipart/form-data">
        @csrf

        <input 
            name="name"
            placeholder="Naam..."
            class="mb-8 bg-transparent block border-b-2 w-full h-10 text-xl outline-none"></input>
        <input 
            name="username"
            placeholder="username..."
            class="mb-8 bg-transparent block border-b-2 w-full h-10 text-xl outline-none"></input>
        <input 
            name="email"
            placeholder="E-mail..."
            class="mb-8 bg-transparent block border-b-2 w-full h-10 text-xl outline-none"></input>
        <button    
            type="submit"
            class="uppercase mt-15 bg-yellow-400 text-gray-100 text-lg font-extrabold py-3 px-5 rounded-2xl">
            Submit
        </button>
    </form>
</div>
</x-app-layout>
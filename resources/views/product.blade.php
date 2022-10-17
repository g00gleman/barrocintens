<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

@foreach ($products as $post)
<div class="sm:grid mt-10 grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
    <div>
        <img src="{{ asset('images/' . $post->image_path) }}" alt="">
    </div>
    <div>
        <h2 class="text-gray-700 font-bold-roboto text-5xl pb-4">
            {{ $post->name }}
        </h2>

        <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-roboto">
            {{ $post->description }}
        </p>

        <a href="/product/shows/{{ $post->id }}" class="uppercase bg-yellow-400 text-gray-100 text-lg font-extrabold-roboto py-4 px-8 rounded-3xl">
            Read description
        </a>
   
    </div>
</div>    
@endforeach

</x-guest-layout>
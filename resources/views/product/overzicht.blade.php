<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Product overzicht
        </h2>
    </x-slot>
    <div>
    <div>
        <div class="pt-15 mt-8 w-4/5 m-auto">
            <a href="/product/create" class="bg-yellow-400 uppercase text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl ">
                Create product
            </a>
        </div>
    </div>


@foreach ($products as $post)
    <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
        <div>
            <img src="{{ asset('images/' . $post->image_path) }}" alt="">
        </div>
        <div>
            <h2 class="text-gray-700 font-bold text-5xl pb-4">
                {{ $post->name }}
            </h2>

            <span class="text-gray-500">
                Price: €<span class="font-bold italic text-gray-800">{{ $post->price }}
            </span>

            <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
                {{ $post->description }}
            </p>

            <a href="/product/show/{{ $post->id }}" class="uppercase bg-yellow-400 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
                Read description
            </a>

                <span class="float-right">
                    <a 
                        href="/product/edit/{{ $post->id }}"
                        class="text-gray-700 italic hover:text-gray-900 pb-1 border-b-2">
                        Edit
                    </a>
                </span>

                <span class="float-right">
                     <form 
                        action="/product/delete/{{ $post->id }}"
                        method="POST">
                        @csrf
                        @method('delete')

                        <button
                            class="text-red-500 pr-3"
                            type="submit">
                            Delete
                        </button>

                    </form>
                </span>
            
        </div>
    </div>    
@endforeach

</x-app-layout>


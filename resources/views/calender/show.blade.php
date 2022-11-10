<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Event bekijken') }}
        </h2>
    </x-slot>
    <div class="w-4/5 m-auto pt-20">
        <form
            action="{{ route('calender.edit',$event->id) }}"
            method="get">
                <span class="text-gray-500">
                    title: <span class="font-bold italic text-gray-800">{{ $event->title }}
                </span>
                <br>
                <span class="text-gray-500">
                    start: <span class="font-bold italic text-gray-800">{{ $event->start }}
                </span>
                <br>
                <span class="text-gray-500">
                    Brand: <span class="font-bold italic text-gray-800">{{ $event->end }}
                </span>
                <br>
                <button class="text-black border border-black py-1.5 px-2.5 rounded-xll">edit</button>
        </form>
</div>
</x-app-layout>

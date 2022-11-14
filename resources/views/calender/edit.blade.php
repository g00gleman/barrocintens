<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Event bewerken') }}
        </h2>
    </x-slot>
    <div class="w-4/5 m-auto pt-20">
        <form
            action="{{ route('calender.store',$event->id) }}"
            method="POST">
                @csrf
                <span class="text-gray-500">
                    title: <input name="title" class="font-bold text-gray-800" value="{{ $event->title }}">
                </span>
                <br>
                <span class="text-gray-500">
                    start: <input name="start" class="font-bold text-gray-800" value="{{ $event->start }}">
                </span>
                <br>
                <span class="text-gray-500">
                    end: <input name="end" class="font-bold text-gray-800" value="{{ $event->end }}">
                </span>
                <br>
                <button type="submit" class="">save</button>
        </form>
</div>
</x-app-layout>

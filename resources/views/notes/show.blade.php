<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-2">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Notitie bekijken') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <table class="w-full text-center">
                    <tr>
                        <th>bedrijf</th>
                        <th>notitie</th>
                        <th>datum</th>
                    </tr>
                    <tr>
                        <td class="bedrijf">{{ $note->company->name }}</td>
                        <td class="note"><textarea disabled name="note" id="" cols="75" rows="10">{{ $note->note }}</textarea></textarea></td>
                        <td class="date">{{ $note->date }}</td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
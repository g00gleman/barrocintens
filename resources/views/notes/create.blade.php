<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-2">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Notities aanmaken') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <form action="{{ route('note.store') }}" method="POST">
                @csrf
                    <table class="w-full text-center">
                        <tr>
                            <th>bedrijf</th>
                            <th>notitie</th>
                            <th>datum</th>
                        </tr>
                        <tr>
                            <td class="bedrijf"><input type="text" name="company_id" placeholder="bedrijfsid"></td>
                            <td class="note"><textarea name="note" id="note" cols="75" rows="10"></textarea></td>
                            <td class="date"><input type="date" name="date"></td>
                        </tr>
                    </table>
                    <div class="text-center mb-2">
                        <button type="submit" class="btn btn-default text-right bg-yellow-400 uppercase text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">aanmaken</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
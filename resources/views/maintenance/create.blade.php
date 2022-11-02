<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-2">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Werkbon aanmaken') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <form action="{{ route('maintenance.store') }}" method="POST">
                @csrf
                    <table class="w-full text-center">
                        <tr>
                            <th>Bedrijf</th>
                            <th>hoe zijn de problemen verholpen?</th>
                            <th>welke materialen zijn gebruikt?</th>
                        </tr>
                        <tr>
                        <td>
                            <select class="mb-8" name="company_id">
                                @foreach($company as $companies)
                                <option value="{{ $companies->id }}">{{ $companies->name }}</option>
                                @endforeach
                            </select>
                            <td class="description"><textarea name="description" id="description" cols="30" rows="8"></textarea></td>
                            <td class="materials"><textarea name="materials" id="materials" cols="30" rows="8"></textarea></td>
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

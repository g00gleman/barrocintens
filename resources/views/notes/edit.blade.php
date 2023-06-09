<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-2">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Notities bewerken') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <form action="{{ route('note.update',$note->id) }}" method="POST">
                @csrf
                @method('put')
                    <table class="w-full text-center">
                        <tr>
                            <th>bedrijf</th>
                            <th>notitie</th>
                        </tr>
                        <tr>
                            <td>
                            <select class="mb-8" name="company_id">
                                @foreach($company as $companies)
                                <option value="{{ $companies->id }}">{{ $companies->name }}</option>
                                @endforeach
                            </select>
                            </td>
                            <td class="note"><textarea name="note" id="note" cols="75" rows="10">{{ $note->note }}</textarea></td>
                            <td class="note hidden"><input type="text" name="id" value="{{ $note->id }}"></td>
                        </tr>
                    </table>
                    <div class="text-center mb-2">
                        <button type="submit" class="btn btn-default text-right bg-yellow-400 uppercase text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">bewerken</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
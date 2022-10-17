<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-2">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Notities') }}
            </h2>
            <a href="{{ route('note.create') }}" class="btn btn-default text-right bg-yellow-400 uppercase text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl"> Maak notitie </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                @foreach ($notes as $note)
                    <table class="w-full text-center">
                        <tr>
                            <th>nummer</th>
                            <th>bedrijf</th>
                            <th>notitie</th>
                            <th>maker</th>
                            <th>datum aangemaakt</th>
                            <th>actions</th>
                        </tr>
                        <tr>
                            <td class="id">{{$note->id}}</td>
                            <td class="bedrijf">{{$note->company->name}}</td>
                            <td class="note">{{$note->note}}</td>
                            <td class="user">{{$note->users_id}}</td>
                            <td class="date">{{$note->date}}</td>
                            <td width="230px">
                                <form action="{{ route('note.destroy',$note->id) }}" method="post">
                                    <a class="btn btn-primary" href="{{ route('note.edit',$note->id) }}">Edit</a>
                                    <a class="btn btn-info" href="{{ route('note.show',$note->id) }}">Show</a>
                                    @csrf
                                    @method('DELETE')
                                    <input type="text" name="id" hidden value="{{ $note->id }}">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    </table>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
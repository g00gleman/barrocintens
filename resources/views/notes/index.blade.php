<style>
.button {
  background-color: #32CD32;
  border: none;
  border-radius: 8px;
  color: white;
  padding: 8px 16px;
  text-align: center;
  font-size: 16px;
  margin: 4px 2px;
  opacity: 0.6;
  transition: 0.3s;
  display: inline-block;
  text-decoration: none;
  cursor: pointer;
}

.button:hover {opacity: 1}

.button1 {
  background-color: #DC143C !important;
  border: none;
  border-radius: 8px;
  color: white;
  padding: 8px 16px;
  text-align: center;
  font-size: 16px;
  margin: 4px 2px;
  opacity: 0.6;
  transition: 0.3s;
  display: inline-block;
  text-decoration: none;
  cursor: pointer;
}

.button1:hover {opacity: 1}

#Notes {
  font-family: roboto;
  border-collapse: collapse;
  width: 79%;
  margin-left: auto;
  margin-right: auto;
  margin-top: 20px;
}

#Notes td, #Notes th {
  border: 1px solid #ddd;
  padding: 8px;
}

#myInput {
  width: 40%;
  font-size: 16px;
  border: 1px solid #ddd;
  margin-top: 40px;
}

#Notes tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}


#Notes th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #FACC15;
  color: white;
}
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-roboto text-xl text-gray-800 leading-tight">
        Notitie overzicht
        </h2>
    </x-slot>
    <div class="pt-15 mt-8 w-4/5 m-auto">
            <a href="/company/create" class="bg-yellow-400 uppercase text-gray-100 text-xs font-roboto py-3 px-5 rounded-3xl ">
                Create Note
            </a>
    </div>
    <div class="ml-40 mt-8 mr-40">
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for name.." title="Type in a name">
    </div>
                @foreach ($notes as $note)
                    <table id="Notes">
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
                                    <a class="button" href="{{ route('note.edit',$note->id) }}">Edit</a>
                                    <a class="button" href="{{ route('note.show',$note->id) }}">Show</a>
                                    @csrf
                                    @method('DELETE')
                                    <input type="text" name="id" hidden value="{{ $note->id }}">
                                    <button type="submit" class="button1">Delete</button>
                                </form>
                            </td>
                        </tr>
                    </table>
                @endforeach

</x-app-layout>
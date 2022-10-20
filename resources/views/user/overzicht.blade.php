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

#customers {
  font-family: roboto;
  border-collapse: collapse;
  width: 79%;
  margin-left: auto;
  margin-right: auto;
  margin-top: 20px;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#myInput {
  width: 40%;
  font-size: 16px;
  border: 1px solid #ddd;
  margin-top: 40px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #FACC15;
  color: white;
}
</style>

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("customers");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-roboto text-xl text-gray-800 leading-tight">
            Users overzicht
        </h2>
    </x-slot>
    <div class="pt-15 mt-8 w-4/5 m-auto">
            <a href="/user/create" class="bg-yellow-400 uppercase text-gray-100 text-xs font-roboto py-3 px-5 rounded-3xl ">
                Create User
            </a>
    </div>
<div class="ml-40 mt-8 mr-40">
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">

</div>

<table id="customers">
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Username</th>
    <th>E-mail</th>
    <th>Role</th>
    <th>Made</th>
    <th>Updated</th>
    <th>Actions</th>
  </tr>

  @foreach($user as $users)
  <form 
        action="/user/delete/{{ $users->id }}"
        method="POST">
        @csrf
        @method('delete')
  <tr>
    <td>{{$users->id}}</td>
    <td>{{$users->name}}</td>
    <td>{{$users->username}}</td>
    <td>{{$users->email}}</td>
    <td>  
      @foreach($userrollen as $rollen)
      @if($rollen->user_id == $users->id) 
        @if($rollen->admin == 1)
        Admin,  
        @endif
        @if($rollen->head_finance == 1)
        Head finance,  
        @endif
        @if($rollen->finance == 1)
        Finance,  
        @endif
        @if($rollen->head_maintenance == 1)
        Head maintenance,  
        @endif
        @if($rollen->maintenance == 1)
        Maintenance,  
        @endif
        @if($rollen->head_sales == 1)
        Head sales,  
        @endif
        @if($rollen->sales == 1)
        Sales,  
        @endif
        @if($rollen->head_inkoop == 1)
        Head inkoop,  
        @endif
        @if($rollen->inkoop == 1)
        Inkoop,  
        @endif
        @if($rollen->klant == 1)
            Klant,  
        @endif
      @endif
          
      @endforeach
    </td>
    <td>{{$users->created_at}}</td>
    <td>{{$users->updated_at}}</td>
    <td><a href="/user/edit/{{ $users->id }}" class="button">Wijzigen</a><button type="submit" class="button1">Delete</button>  </td>
  </tr>
  </form>
  @endforeach
</table>

</x-app-layout>

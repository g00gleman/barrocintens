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

#Bedrijf {
  font-family: roboto;
  border-collapse: collapse;
  width: 79%;
  margin-left: auto;
  margin-right: auto;
  margin-top: 20px;
}

#Bedrijf td, #Bedrijf th {
  border: 1px solid #ddd;
  padding: 8px;
}

#myInput {
  width: 40%;
  font-size: 16px;
  border: 1px solid #ddd;
  margin-top: 40px;
}

#Bedrijf tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}


#Bedrijf th {
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
  table = document.getElementById("Bedrijf");
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
        voorraad overzicht
        </h2>
    </x-slot>
<div class="ml-40 mt-8 mr-40">
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for name.." title="Type in a name">
</div>

<table id="Bedrijf">
  <tr>
    <th>ID</th>
    <th>User</th>
    <th>Product</th>
    <th>Hoeveelheid</th>
    <th>Check</th>
    <th>Actie's</th>
  </tr>

  @foreach($voorraad as $voorraad)
  <form 
        action="/voorraad/delete/{{ $voorraad->id }}"
        method="POST">
        @csrf
        @method('delete')
  <tr>
    <td>{{$voorraad->id}}</td>
    <td>{{$voorraad->user->name}}</td>

    <td>
        @foreach($product as $products)
            @if($voorraad->product_id == $products->id)
                {{$products->name}}
            @endif
        @endforeach
    </td>
    <td>{{$voorraad->amount}}</td>
    @if($voorraad->check == 1)
    <td>✔️</td>
    @else
    <td>❌</td>
    @endif

    
    <td><a href="/voorraad/edit/{{ $voorraad->id }}" class="button">Wijzigen</a>
    <button type="submit" class="button1">Delete</button> 
    </td>
  </tr>
  </form>

  @endforeach
</table>

</x-app-layout>
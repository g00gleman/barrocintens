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

#Meldingen {
  font-family: roboto;
  border-collapse: collapse;
  width: 79%;
  margin-left: auto;
  margin-right: auto;
  margin-top: 20px;
}

#Meldingen td, #Meldingen th {
  border: 1px solid #ddd;
  padding: 8px;
}

#myInput {
  width: 40%;
  font-size: 16px;
  border: 1px solid #ddd;
  margin-top: 40px;
}

#Meldingen tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}


#Meldingen th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #FACC15;
  color: white;
}
</style>

<script>
function name() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myName");
  filter = input.value.toUpperCase();
  table = document.getElementById("Meldingen");
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
function company() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("mycompany");
  filter = input.value.toUpperCase();
  table = document.getElementById("Meldingen");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
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
        Overzicht meldingen
        </h2>
    </x-slot>

    <div class="ml-40 mt-8 mr-40">
        <div class="my-5">
            <a href="{{ route('maintenance.create') }}" class="bg-yellow-400 uppercase ml-2 text-gray-100 text-xs font-roboto py-3 px-5 rounded-3xl ">werkbon aanmaken</a>
        </div>

        <input type="text" id="myName" onkeyup="name()" placeholder="Zoek op naam.." title="Type in a name">
        <input type="text" id="mycompany" onkeyup="company()" placeholder="Zoek voor bedrijf.." title="Type in a name">
    </div>


        <table id="Meldingen">
        <tr>
            <th>Medewerker</th>
            <th>Bedrijf</th>
            <th>Beschrijving</th>
            <th>Materialen</th>
            <th>Aangemaakt op</th>
        </tr>

        @foreach($melding as $meldingen)

        <tr>
            <td>{{$meldingen->remark}}</td>
            <td>{{$meldingen->company_id}}</td>
            <td>{{$meldingen->date_added}}</td>
        </tr>
        @endforeach

        @foreach($werkbon as $werkbon)

        <tr>
            <td>{{$werkbon->user->name}}</td>
            <td>{{$werkbon->company->name}}</td>
            <td>{{$werkbon->description}}</td>
            <td>{{$werkbon->materials}}</td>
            <td>{{$werkbon->created_at}}</td>
        </tr>
        @endforeach
        </table>




</x-app-layout>

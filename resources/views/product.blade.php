<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
<div class="ml-40 mt-8 mr-40">
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Zoek voor naam.." title="Type in a name">
    <input type="text" id="myInput2" onkeyup="myFunction2()" placeholder="Zoek voor merk.." title="Type in a brand">
    <input type="text" id="myInput3" onkeyup="myFunction2()" placeholder="Zoek op voorraad.." title="Type voorraad">

</div>

<table id="product">

@foreach ($products as $post)
  @if($post->category_id == 3)
  @else
  @if($post->amount != 0)
  <?php
    $stock = 'Momenteel leverbaar';
  ?>
  @else($post->amount == 0)
  <?php
    $stock = 'Uit voorraad';
  ?>
  @endif
  <tr>
  </tr>
  <tr>
    <td hidden>{{ $post->name }}</td>
    <td hidden>{{ $post->brand }}</td>
    <td hidden>{{ $stock }}</td>
    <td>
        <div class="sm:grid mt-10 grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
            <div>
                <img src="{{ asset('images/' . $post->image_path) }}" alt="">
            </div>
            <div>
                <p class="text-gray-700 font-bold-roboto text-5xl pb-4">
                    {{ $post->name }}
                </p>
                <span class="text-gray-500">
                  Merk:<span class="font-bold roboto text-gray-800">{{ $post->brand }}
                </span>
                </br>

                <span class="text-gray-500">
                <span class="font-bold roboto text-gray-800">{{$stock}}
                </span>
                <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-roboto">
                    {{ $post->description }}
                </p>

                <a href="/product/shows/{{ $post->id }}" class="uppercase bg-yellow-400 text-gray-100 text-lg font-extrabold-roboto py-4 px-8 rounded-3xl">
                    Lees beschrijving
                </a>

            </div>
        </div> 
    </td>
  </tr>
  @endif

@endforeach
</table>
</x-guest-layout>

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("product");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
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
function myFunction2() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput2");
  filter = input.value.toUpperCase();
  table = document.getElementById("product");
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
function myFunction2() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput3");
  filter = input.value.toUpperCase();
  table = document.getElementById("product");
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



<!-- Modal -->
<style>
.modal {
  display: none; 
  position: fixed; 
  z-index: 1; 
  padding-top: 100px; 
  left: 0;
  top: 0;
  width: 100%; 
  height: 100%; 
  overflow: auto; 
  background-color: rgb(0,0,0); 
  background-color: rgba(0,0,0,0.4); 
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 80%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

.close {
    color: white;
    float: right;
    font-size: 19px;
    font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
    padding: 8px 10px 20px 8px;
    background-color: #FACC15;
    color: white;
}

.modal-body {padding: 2px 14px;}

</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-roboto text-xl text-gray-800 leading-tight">
            Product overzicht
        </h2>
    </x-slot>
    <div>
    @if(session()->get('admin') == 1 || session()->get('inkoop') == 1|| session()->get('head_inkoop') == 1)
    <div>
        <div class="pt-15 mt-8 w-4/5 m-auto">
            <a href="/product/create" class="bg-yellow-400 uppercase text-gray-100 text-xs font-roboto py-3 px-5 rounded-3xl ">
                Create product
            </a>
            <button id="myBtn" class="bg-yellow-400 uppercase ml-2 text-gray-100 text-xs font-roboto py-3 px-5 rounded-3xl " data-bs-toggle="modal" data-bs-target="#exampleModal">
                Create category
            </button>
        </div>
    </div>
    @endif
<div class="ml-40 mt-8 mr-40">
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for name.." title="Type in a name">
</div>
<table id="product">
@foreach ($products as $post)
<tr>
  </tr>
  <tr>
    <td hidden>{{ $post->name }}</td>
    <td hidden>{{ $post->brand }}</td>
    <td>
    <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
        <div>
            <img style="max-width: auto; height: 400px; object-fit: center;" src="{{ asset('images/' . $post->image_path) }}" alt="">
        </div>
        <div>
            <h2 class="text-gray-700 font-bold-roboto text-5xl pb-4">
                {{ $post->name }}
            </h2>

            <span class="text-gray-500">
                Price: €<span class="font-bold roboto text-gray-800">{{ $post->price }}
            </span>
            <br>
            <span class="text-gray-500">
                Brand:<span class="font-bold roboto text-gray-800">{{ $post->brand }}
            </span>

            <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-roboto">
                {{ $post->description }}
            </p>

            <a href="/product/show/{{ $post->id }}" class="uppercase bg-yellow-400 text-gray-100 text-lg font-extrabold-roboto py-4 px-8 rounded-3xl">
                Read description
            </a>
            @if(session()->get('admin') == 1 || session()->get('inkoop') == 1|| session()->get('head_inkoop') == 1)

                <span class="float-right">
                    <a 
                        href="/product/edit/{{ $post->id }}"
                        class="text-gray-700 roboto hover:text-gray-900 pb-1 border-b-2">
                        Edit
                    </a>
                </span>

                <span class="float-right">
                     <form 
                        action="/product/delete/{{ $post->id }}"
                        method="POST">
                        @csrf
                        @method('delete')

                        <button
                            class="text-red-500 pr-3"
                            type="submit">
                            Delete
                        </button>

                    </form>
                </span>
            @endif
        </div>
    </div>
    </td>
  </tr>    
@endforeach
</table>
                                            
<body>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Overzicht category</h2>
    </div>
    <div class="modal-body">
    <form 
    action="{{ route('product.overzicht') }}" 
    method="POST">
    @csrf
    <input 
        name="name"
        placeholder="Name..."
        class="bg-transparent mb-8 block border-b-2 w-full h-10 text-3xl outline-none"></input>
        <button    
            type="submit"
            class="uppercase  bg-yellow-400 text-gray-100 text-lg font-extrabold py-2 px-3 rounded-2xl">
            Submit
        </button>
    </form>
        @foreach ($categories as $category)
            <h1 >
                <form 
                    action="/product_category/delete/{{ $category->id }}"
                    method="POST">
                    @csrf
                    @method('delete')
                    {{ $category->name }}
                    <button
                        class="text-red-500"
                        type="submit">
                        Delete
                    </button>
                </form>
            </h1>      
        @endforeach
    </div>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
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
</script>
</body>

</x-app-layout>


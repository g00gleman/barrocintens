<x-guest-layout>

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

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="w-4/5 m-auto mb-20 pt-20">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $products->name }}
    </h2>
    <div class="sm:grid grid-cols-2 gap-10 w-3/6 mx-6 py-13 border-b border-gray-200">
        <div>
            <img src="{{ asset('images/' . $products->image_path) }}" alt="">
        </div>
    </div>
    <span class="text-gray-500">
        Merk: <span class="font-bold italic text-gray-800">{{ $products->brand }}
    </span>
    </br>
    @if($products->amount != 0)
    <?php
      $stock = 'Momenteel leverbaar';
    ?>
    @else($products->amount == 0)
    <?php
      $stock = 'Uit voorraad';
    ?>
    @endif

    <span class="text-gray-500">
    <span class="font-bold roboto text-gray-800">{{$stock}}
    <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
        {{ $products->description }}
    </p>
    <button id="myBtn" class="bg-yellow-400 uppercase ml-2 text-gray-100 text-xs font-roboto py-3 px-5 rounded-3xl " data-bs-toggle="modal" data-bs-target="#exampleModal">
        Offerte
    </button>   
  </div>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Offerte</h2>
    </div>
    <div class="modal-body">
    <form 
    action="{{ route('product.shows') }}" 
    method="POST"
    enctype="multipart/form-data">
    @csrf
    <h3>Wij nemen zo snel mogelijk contact met u op nadat u uw informatie naar ons stuurt.</h3>
    @if ($errors->any())
    <div class="mt-2 w-4/5 m-auto">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-center w-1/5 mb-4 text-gray-50 bg-red-700 rounded-2xl py-4">
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
    @endif
    </br>
    <input 
        name="naam"
        placeholder="Voornaam..."
        class="mb-8 bg-transparent block border-b-2 w-full h-10 text-xl outline-none"></input>
    <input 
        name="achternaam"
        placeholder="Achternaam..."
        class="mb-8 bg-transparent block border-b-2 w-full h-10 text-xl outline-none"></input>
    <input 
        name="bedrijfnaam"
        placeholder="Bedrijfnaam..."
        class="mb-8 bg-transparent block border-b-2 w-full h-10 text-xl outline-none"></input>
    <input 
        name="email"
        placeholder="Email..."
        class="mb-8 bg-transparent block border-b-2 w-full h-10 text-xl outline-none"></input>
    <input 
        name="telefoonnummer"
        placeholder="Telefoonnummer..."
        class="mb-8 bg-transparent block border-b-2 w-full h-10 text-xl outline-none"></input>
    <input 
        name="land"
        placeholder="Land..."
        class="mb-8 bg-transparent block border-b-2 w-full h-10 text-xl outline-none"></input>
    <input 
        name="stad"
        placeholder="Stad..."
        class="mb-8 bg-transparent block border-b-2 w-full h-10 text-xl outline-none"></input>
    <input 
        name="straat"
        placeholder="Straat..."
        class="mb-8 bg-transparent block border-b-2 w-full h-10 text-xl outline-none"></input>
    <input 
        name="huisnummer"
        placeholder="Huisnummer..."
        class="mb-8 bg-transparent block border-b-2 w-full h-10 text-xl outline-none"></input>
    <div class="flex flex-wrap -mx-3 mb-2">
          <div class="w-full px-3 mb-2 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
              Product toevoegen
            </label>
            <div class="relative">
              <button type="button" class="addProduct">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                  <path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zM200 344V280H136c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H248v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg>
                  <style>
                    svg {
                      max-width: 100%;
                      height: 30px;
                      }  
                  </style>
                  </svg>
                </button>
              </div>
            </div>
          </div>
        <button    
            class="uppercase  bg-yellow-400 text-gray-100 text-lg font-extrabold py-2 px-3 rounded-2xl">
            Submit
        </button>
    </form>
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


</script>

</x-guest-layout>
<script>
var count = 0;

$(document).on('click', '.addProduct', function(){
        count++;
        var html = '<div class="flex flex-wrap-mx-3 mb-1"><div class="w-3/4"><select onchange="getval(this);" id="' +count+ '" name="product_id[' +count+ ']" class="product_id appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">@foreach($allproducts as $Products)<option id="{{$Products->id}}" value="{{$Products->id}}">{{$Products->id}}  {{$Products->name}}</option>@endforeach</select></div></div></div>';
        $(this).parent().append(html);
}); 

function getval(sel)
{
    var productID = $(sel).children(":selected").attr("id");
}

</script>
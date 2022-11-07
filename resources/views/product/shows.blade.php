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

<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="w-4/5 m-auto pt-20">
    <div class="sm:grid grid-cols-2 gap-10 w-3/6 mx-6 py-13 border-b border-gray-200">
        <div>
            <img src="{{ asset('images/' . $products->image_path) }}" alt="">
        </div>
    </div>
    <span class="text-gray-500">
        Brand: <span class="font-bold italic text-gray-800">{{ $products->brand }}
    </span>
    <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
        {{ $products->description }}
    </p>
    <button id="myBtn" class="bg-yellow-400 uppercase ml-2 text-gray-100 text-xs font-roboto py-3 px-5 rounded-3xl " data-bs-toggle="modal" data-bs-target="#exampleModal">
        Offerte
    </button>   
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
    action="{{ route('contact') }}">
    @csrf
    <h3>You need to contact us if you want more information about our product</h3>
    <input 
        name="phone"
        placeholder="Phone number..."
        class="bg-transparent mb-8 block border-b-2 w-full h-10 text-3xl outline-none"></input>
        <button    
            class="uppercase  bg-yellow-400 text-gray-100 text-lg font-extrabold py-2 px-3 rounded-2xl">
            Submit
        </button>
    </form>
  </div>

</div>
</x-guest-layout>
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
@include('layouts.footer')
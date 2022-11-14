<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Factuur aanmaken
        </h2>
    </x-slot>
    <section class="text-gray-600 body-font overflow-hidden">
        <form class="w-full max-w-lg container px-5 py-12 mx-auto" action="{{ route('factuur.create') }}" method="POST" enctype="multipart/form-data">
          @csrf
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                  Bedrijfs naam:
                </label>
                <select name="company_id" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password">
                  @foreach($company as $companies)
                    <option value="{{$companies->id}}">{{$companies->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
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
              <div class="pt-15 mt-8 w-full m-auto ml-3">
                <button type="submit" class="bg-blue-400 uppercase text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl ">
                    Submit
                </button>
                <a href="/factuur" class="uppercase text-red-400 text-xs font-extrabold py-3 px-5 underline">
                  Cancel
                </a>
            </div>
            </div>
          </form>
    </section>

    <script>
      var count = 0;

      $(document).on('click', '.addProduct', function(){
              count++;
              var html = '<div class="flex flex-wrap-mx-3 mb-1"><div class="w-3/4"><select onchange="getval(this);" id="' +count+ '" name="product_id[' +count+ ']" class="product_id appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">@foreach($products as $Products)<option id="{{$Products->id}}" value="{{$Products->id}}">{{$Products->name}}</option>@endforeach</select></div><div class="w-1/4 px-3 amount"><input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="number" value="1" min="1" id="' +count+ '" name="1"></input></div></div>';
              $(this).parent().append(html);
      }); 

      function getval(sel)
      {
          var productID = $(sel).children(":selected").attr("id");
          var countedID = $(sel).attr("id");
          $( ".amount" ).children( "#" +countedID).attr('name', productID);
      }

    </script>
</x-app-layout>
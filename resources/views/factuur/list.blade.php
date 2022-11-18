<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl text-gray-800 leading-tight">
            Factuur lijst
        </h2>
        </x-slot>
        <section class="text-gray-600 body-font overflow-hidden">
<div class="ml-40 mt-8 mr-40">
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Zoek voor bedrijf.." title="Type in a name">
</div>
<table id="factuur">
@foreach ($invoices as $AllInvoices)
  <tr>
    </tr>
    <tr>
      <td hidden>{{ $AllInvoices->company_name }}</td>
      <td>
        <div class="container px-5 py-12 mx-auto">
            <div class="-my-8 divide-y-2 divide-gray-100">
            <div class="py-8 flex flex-wrap md:flex-nowrap">
                <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
                </div>
                <div class="md:flex-grow">
                <h2 class="text-2xl font-medium text-gray-900 title-font mb-2">Factuur nr. {{ $AllInvoices->id }}</h2>
                <p class="leading-relaxed">@foreach($invoice_products as $products) @if ($products->invoice_id == $AllInvoices->id) {{ $products->amount }}x {{ $products->products->name }}. @endif @endforeach</p>
                <p class="leading-relaxed"> Bedrijf: {{ $AllInvoices->company_name }}.</p>
                <?php
                    $nummer = $AllInvoices->leases_id;
                    $totaal = $nummer +  12000;
                ?>
                <p class="leading-relaxed"> Leasenummer: <b>{{ $totaal }}</b>.</p>
                <a class="text-red-500 inline-flex items-center mt-4" href="/factuur/{{ $AllInvoices->id }} ">Download Factuur
                    <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14"></path>
                    <path d="M12 5l7 7-7 7"></path>
                    </svg>
                </a>
                </div>
            </div>
            </div>
        </div>
        </td>
    </tr>
  @endforeach
</table>

    </section>
</x-app-layout>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("factuur");
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
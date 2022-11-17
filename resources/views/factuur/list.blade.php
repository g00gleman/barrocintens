<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl text-gray-800 leading-tight">
            Factuur lijst
        </h2>
        </x-slot>
        <section class="text-gray-600 body-font overflow-hidden">

        @foreach ($invoices as $AllInvoices)

        <div class="container px-5 py-12 mx-auto">
            <div class="-my-8 divide-y-2 divide-gray-100">
            <div class="py-8 flex flex-wrap md:flex-nowrap">
                <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
                </div>
                <div class="md:flex-grow">
                <h2 class="text-2xl font-medium text-gray-900 title-font mb-2">Factuur nr. {{ $AllInvoices->id }}</h2>
                <p class="leading-relaxed">



                </p>
                <p class="leading-relaxed"> Bedrijf: {{ $AllInvoices->company->name }}.</p>
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

        @endforeach


    </section>
</x-app-layout>

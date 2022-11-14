<x-app-layout>
    <x-slot name="header">
        <h2 class="font-roboto text-xl text-gray-800 leading-tight">
        Lease overzicht
        </h2>
    </x-slot>
    <div class="pt-15 mt-8 w-4/5 m-auto">
        <a href="/leasecontracten/create" class="bg-yellow-400 uppercase text-gray-100 text-xs font-roboto py-3 px-5 rounded-3xl ">
            Create leasecontract
        </a>
    </div>
    @foreach($leases as $leases)
    <div class="container px-5 py-12 mx-auto">
            <div class="-my-8 divide-y-2 divide-gray-100">
            <div class="py-8 flex flex-wrap md:flex-nowrap">
                <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
                </div>
                <div class="md:flex-grow">
                <?php
                    $leasenummer = 12000 + $leases->id;
                ?>
                <h2 class="text-2xl font-medium text-gray-900 title-font mb-2">Lease contract nr. {{$leasenummer}}</h2>
                <p class="leading-relaxed">Bedrijf: {{$leases->company->name}}</p>
                @if($leases->weken != 0)
                <?php
                    $weekdagen = $leases->weken * 7;
                    $totaaldagen = $weekdagen + $leases->dagen;
                ?>
                @else
                <?php
                    $totaaldagen = $leases->dagen;
                ?>
                @endif
                <p class="leading-relaxed">Factuur gestuurd om de <b>{{$totaaldagen}}</b> dagen</p>
                <p class="leading-relaxed">lease duurt <b>{{$leases->duur}}</b> dagen</p>
                <p class="leading-relaxed">lease gemaakt op <b>{{$leases->created_at->format('d M Y')}}</b></p>
                <p class="leading-relaxed">lease eindigt op <b>{{$leases->created_at->addDays($leases->duur)->format('d M Y');}}</b></p>
                
                <span class="float-left mr-2">
                    <a 
                        href="/leasecontracten/edit/{{ $leases->id }}"
                        class="text-gray-700 roboto hover:text-gray-900 pb-1 border-b-2">
                        Edit
                    </a>
                </span>

                <span class="float-left">
                     <form 
                        action="/leasecontracten/delete/{{ $leases->id }}"
                        method="POST">
                        @csrf
                        @method('delete')

                        <button style="margin-top: 8px;"
                            class="text-red-500 pr-3"
                            type="submit">
                            Delete
                        </button>

                    </form>
                </span>
                </div>
            </div>
            </div>
        </div>
        @endforeach
</x-app-layout>

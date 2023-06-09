<nav x-data="{ open: false }" class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded">
    <!-- Primary Navigation Menu -->
    <div class="container justify-between items-center mx-auto">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <?php
                    $baseurl = env('APP_URL');
                ?>
                <a href="http://barrocintens.test/" class="flex items-center">
                    <img src="/fotos/logo/Logo5_groot.png" class="mr-3 h-6 sm:h-9" alt="Barrocintens logo">
                    <span class="self-center text-xl font-semibold whitespace-nowrap">Barrocintens</span>
                </a>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    @if(session()->get('admin') == 1 || session()->get('inkoop') == 1|| session()->get('head_inkoop') == 1)
                    <x-nav-link href="{{ route('product.overzicht') }}" :active="request()->routeIs('product.overzicht')">
                        {{ __('Products') }}
                    </x-nav-link>
                    @endif
                    @if(session()->get('admin') == 1 || session()->get('inkoop') == 1|| session()->get('head_inkoop') == 1)
                    <x-nav-link href="{{ route('voorraad.overzicht') }}" :active="request()->routeIs('voorraad.overzicht')">
                        {{ __('Voorraad') }}
                    </x-nav-link>
                    @endif
                    @if(session()->get('admin') == 1 || session()->get('sales') == 1|| session()->get('head_sales') == 1 || session()->get('finance') == 1|| session()->get('head_finance') == 1)
                    <x-nav-link href="{{ route('company.overzicht') }}" :active="request()->routeIs('company.overzicht')">
                        {{ __('Bedrijven') }}
                    </x-nav-link>
                    @endif
                    @if(session()->get('admin') == 1 || session()->get('sales') == 1|| session()->get('head_sales') == 1)
                    <x-nav-link href="{{ route('user.overzicht') }}" :active="request()->routeIs('user.overzicht')">
                        {{ __('Users') }}
                    </x-nav-link>
                    @endif
                    @if(session()->get('admin') == 1 || session()->get('maintenance') == 1|| session()->get('head_maintenance') == 1)
                    <x-nav-link href="{{ route('maintenance.MeldingOverzicht') }}" :active="request()->routeIs('maintenance.MeldingOverzicht')">
                        {{ __('Meldingen') }}
                    </x-nav-link>
                    @endif
                    @if(session()->get('admin') == 1 || session()->get('sales') == 1|| session()->get('head_sales') == 1)
                    <x-nav-link href="{{ route('offerte.overzicht') }}" :active="request()->routeIs('offerte.overzicht')">
                        {{ __('Offerte') }}
                    </x-nav-link>
                    @endif
                    @if(session()->get('admin') == 1 || session()->get('finance') == 1|| session()->get('head_finance') == 1)
                    <x-nav-link href="{{ route('leasecontracten.overzicht') }}" :active="request()->routeIs('leasecontracten.overzicht')">
                        {{ __('Leasecontracten') }}
                    </x-nav-link>
                    @endif
                    @if(session()->get('admin') == 1 || session()->get('klant') == 1 || session()->get('finance') == 1|| session()->get('head_finance') == 1)
                    <x-nav-link href="{{ route('factuur.list') }}" :active="request()->routeIs('factuur.list')">
                        {{ __('Factuur') }}
                    </x-nav-link>
                    @endif
                    @if(session()->get('admin') == 1 || session()->get('sales') == 1|| session()->get('head_sales') == 1)
                    <x-nav-link href="{{ route('note.index') }}" :active="request()->routeIs('note.index')">
                        {{ __('Notes') }}
                    </x-nav-link>
                    @endif
                    @if(session()->get('admin') == 1 || session()->get('maintenance') == 1|| session()->get('head_maintenance') == 1)
                    <x-nav-link href="{{ route('calender') }}" :active="request()->routeIs('calender')">
                        {{ __('Calender') }}
                    </x-nav-link>
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->username }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('product.overzicht') }}" :active="request()->routeIs('product.overzicht')">
                {{ __('Products') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('company.overzicht') }}" :active="request()->routeIs('company.overzicht')">
                {{ __('Bedrijven') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('user.overzicht') }}" :active="request()->routeIs('user.overzicht')">
                {{ __('Users') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('maintenance.MeldingOverzicht') }}" :active="request()->routeIs('maintenance.MeldingOverzicht')">
                {{ __('Meldingen') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('factuur.list') }}" :active="request()->routeIs('factuur.list')">
                {{ __('Factuur') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('note.index') }}" :active="request()->routeIs('note.index')">
                {{ __('Notes') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

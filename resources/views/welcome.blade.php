<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
    <section class="text-gray-600 body-font">
  <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
    <img class="lg:w-2/6 md:w-3/6 w-5/6 mb-10 object-cover object-center rounded" alt="hero" src="/fotos/logo/Logo1_groot.png">
    <div class="text-center lg:w-2/3 w-full">
      <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Barrocintens</h1>
      <p class="mb-8 leading-relaxed">Wij verhuren koffie apparaten voor horeca bedrijven. We verkopen ook koffie bonen voor gebruik bij onze koffie apparaten</p>
      <div class="flex justify-center">
        <button class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Contact</button>
        <button class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">Store</button>
      </div>
      <div class="py-12">
      <section class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-wrap -mx-4 -mb-10 text-center">
      <div class="sm:w-1/2 mb-10 px-4">
        <div class="rounded-lg h-64 overflow-hidden">
          <img alt="content" class="object-cover object-center h-full w-full" src="/images/machine-bit-deluxe.png">
        </div>
        <h2 class="title-font text-2xl font-medium text-gray-900 mt-6 mb-3">Koffie apparaten</h2>
        <p class="leading-relaxed text-base">Bekijk ons assortiment aan koffie apparaten</p>
        <form 
          action="/product">
          @csrf
          <button  class="flex mx-auto mt-6 text-white bg-indigo-500 border-0 py-2 px-5 focus:outline-none hover:bg-indigo-600 rounded">Bekijk</button>
      </form>
      </div>
      <div class="sm:w-1/2 mb-10 px-4">
        <div class="rounded-lg h-64 overflow-hidden">
          <img alt="content" class="object-cover object-center h-full w-full" src="/fotos/pexels-rita-lakewood-10433523.jpg">
        </div>
        <h2 class="title-font text-2xl font-medium text-gray-900 mt-6 mb-3">Koffie bonen</h2>
        <p class="leading-relaxed text-base">Bekijk ons assortiment aan koffie bonen.</p>
        <button class="flex mx-auto mt-6 text-white bg-indigo-500 border-0 py-2 px-5 focus:outline-none hover:bg-indigo-600 rounded">Bekijk</button>
      </div>
    </div>
  </div>
</section>
        </div>
    </div>
  </div>
</section>
    </div>
</x-guest-layout>



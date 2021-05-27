<link rel="stylesheet" href="/css/app.css">

@livewireStyles

<style>
  .breadcrumb .breadcrumb-item {
    color: rgba(59, 130, 246, 1);;
    position: relative;
  }
  .breadcrumb .breadcrumb-item:first-child {
    margin-left: 0 !important;
  }
  .breadcrumb .breadcrumb-item:not(:last-child):after {
    content: '/';
  }

  .breadcrumb .breadcrumb-item a {
    color: gray;
  }

  [x-cloak] { display: none; }
</style>

    <div class="w-full bg-white border-t border-b border-gray-200 px-5 pt-8 text-gray-800">
        <div class="w-full max-w-6xl mx-auto">
            <div class="text-center max-w-xl mx-auto">
                <h1 class="text-6xl md:text-5xl font-bold mb-5 text-gray-600">Najnovší výber hier</h1>
                <div class="text-center mb-10">
                    <span class="inline-block w-1 h-1 rounded-full bg-blue-300 ml-1"></span>
                    <span class="inline-block w-3 h-1 rounded-full bg-blue-300 ml-1"></span>
                    <span class="inline-block w-40 h-1 rounded-full bg-blue-300"></span>
                    <span class="inline-block w-3 h-1 rounded-full bg-blue-300 ml-1"></span>
                    <span class="inline-block w-1 h-1 rounded-full bg-blue-300 ml-1"></span>
                </div>
            </div>
        </div>
    </div>

<div class="w-full bg-white my-2">
        <nav aria-label="breadcrumb"> 
        <ol class="breadcrumb flex justify-center">
          <li class="breadcrumb-item text-gray-600"><a href="{{ route('home') }}" class="text-gray-600 hover:text-purple-700 mx-2">Domov</a></li>
          <li class="breadcrumb-item text-gray-600"><a href="{{ route('home') }}" class="text-gray-600 hover:text-purple-700 mx-2">Hry</a></li>
          <li class="breadcrumb-item active text-purple-700 hover:text-purple-700 mx-2" aria-current="page">{{ $product->name }}</li> 
        </ol>
      </nav>
</div>

<div class="text-gray-700 body-font overflow-hidden bg-white border-b border-gray-200">
  <div class="container px-5 py-4 mx-auto">
    <div class="lg:w-4/5 mx-auto flex flex-wrap">
      <img alt="ecommerce" class="lg:w-1/2 w-full object-cover object-center rounded" src="{{ $product->image }}">
      <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
        <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{ $product->name }}</h1>

        <p class="leading-relaxed pt-4">{{ $product->description }}</p>
        
        <div class="flex pt-4">
          <span class="title-font font-medium text-5xl text-gray-900">{{ $product->price }} €</span>
          <button class="flex ml-auto text-white border-0 py-2 px-4 focus:outline-none bg-blue-500 rounded">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
          Do košíka</button>
        </div>
      </div>
    </div>
  </div>
</div>


    <div class="w-full bg-white border-t px-5 pt-8 text-gray-800">
        <div class="w-full max-w-6xl mx-auto">
            <div class="text-center max-w-xl mx-auto">
                <h1 class="text-6xl md:text-3xl font-bold mb-5 text-gray-600">Steam recenzie</h1>
                @if($steamReview)
                Hodnotenie : {{ $steamReview->review_score }}/10 | Hodnotenie uživateľov : {{ $steamReview->review_score_desc }}
                | Kladných hodnotení : {{ $steamReview->total_positive }} | Negativnych hodnotení : {{ $steamReview->total_negative }}
                @endif
            </div>
            <div class="flex justify-center m-4">
              @if($steamReview)
                <livewire:reviews :steamId="$product->steamId" :cursor="$steamReview->cursor" />
              @endif
            </div>
        </div>
    </div>

    @livewireScripts
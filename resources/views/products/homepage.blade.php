<link rel="stylesheet" href="/css/app.css">

@if($errors->any())
    {!! implode('', $errors->all('<div class="flex justify-center items-center m-1 font-medium py-1 px-2 rounded-md text-red-700 bg-red-100 border border-red-300">:message</div>')) !!}
@endif

<div class="flex content-center place-content-center border mb-10">
  	<form method="post" action="{{ route('product.store') }}" class="my-2">
      @csrf
    	<input value="{{ old('steamid') }}" name="steamid" class="rounded-l-lg p-4 border-t mr-0 border-b border-l text-gray-800 border-gray-200 bg-white" placeholder="steamID hry"/>
		<button type="submit" class="px-8 rounded-r-lg bg-yellow-400  text-gray-800 font-bold p-4 uppercase border-yellow-500 border-t border-b border-r">Pridať novú hru</button>
	</form>
</div>


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

<div class="grid grid-cols-5 gap-4 px-10">

    @forelse($products as $product)

    <div class="max-w-xs bg-white shadow-lg rounded-lg overflow-hidden my-10">
        <div class="px-4 py-2">
            <h1 class="text-gray-900 font-bold text-2xl uppercase h-20">
                <a href="{{ route('product',['slug' => $product->slug]) }}">
                    {{ $product->name }}
                </a>
            </h1>
            <p class="text-gray-600 text-sm mt-1 h-14">{{ $product->short_description  ?? '' }}</p>
        </div>
        <img class="max-h-80 w-full object-cover mt-2" src="{{ $product->image }}" alt="{{ $product->name }}">
        <div class="flex items-center justify-between px-4 py-2 bg-gray-900">
            <h1 class="text-gray-200 font-bold text-xl">{{ $product->price }} €</h1>
            <a href="{{ route('product',['id' => $product->id, 'slug' => $product->slug]) }}" class="px-3 py-1 bg-gray-200 text-sm text-gray-900 font-semibold rounded">
                Detail
            </a>
        </div>
    </div>
    @empty

    @endforelse

</div>
<div>
@forelse ($reviews['reviews'] as $review )
    <div class="bg-white rounded-lg p-3  flex flex-col justify-center items-center md:items-start shadow-lg mb-4">
        <div class="flex flex-row justify-center mr-2">
            <img alt="avatar" width="48" height="48" class="rounded-full w-10 h-10 mr-4 shadow-lg mb-4" src="{{ $review['user']['avatar'] }}">
            <h3 class="text-blue-300 font-semibold text-lg text-center md:text-left ">{{ $review['user']['name'] }}</h3>
        </div>
        <p style="width: 90%" class="text-gray-600 text-lg text-center md:text-left ">{{ $review['review'] }}</p>
    </div>    


@empty
    No reviews
@endforelse

    <div class="flex justify-center">
        <button wire:click="loadMoreReviews('{{$reviews['cursor']}}')" class="bg-green-500 p-2 text-white rounded-md">Načítať viac recenzií</button>
    </div>
</div>
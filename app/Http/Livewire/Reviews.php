<?php

namespace App\Http\Livewire;

use App\Models\Review;
use Livewire\Component;
use App\Services\SteamService;

class Reviews extends Component
{
    public $cursor; 
    public $steamId;
    public $loadMore;

    public function mount($steamId,$cursor){
        $this->steamId = $steamId;
        $this->cursor = $cursor;
    }

    public function loadMoreReviews($cursor){
        $this->loadMore = true;
        $this->cursor = $cursor;
    }

    public function render()
    {
        if($this->loadMore){
            $steamReviews = new SteamService();

            return view('livewire.steam-reviews',[
                'reviews' => $steamReviews->getSteamReviews($this->steamId,$this->cursor,true),
            ]);
        } else {
            return view('livewire.reviews',[
                'reviews' => Review::where('steamId',$this->steamId)->get(),
            ]);
        }
    }
}

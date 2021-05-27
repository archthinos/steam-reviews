<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SteamReviews extends Component
{
    public $cursor; 
    public $steamId;
    public $loadMore;

    public function mount($steamId,$cursor){
        $this->steamId = $steamId;
        $this->cursor = $cursor;
    }

    public function loadMoreReviews($cursor){
        $this->cursor = $cursor;
        //dd($this->cursor);
    }

    public function render()
    {
            $steamReviews = new SteamService();

            return view('livewire.steam-reviews',[
                'reviews' => $steamReviews->getSteamReviews($this->steamId,$this->cursor,true),
            ]);
    }
}

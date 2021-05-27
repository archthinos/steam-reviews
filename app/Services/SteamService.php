<?php

namespace App\Services;

use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class SteamService
{
    public function steamUserDetails($steamid){
        $response = Http::get('http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/',[
            'key' => config('steam.STEAM_API_KEY'),
            'steamids' => $steamid,
        ])->collect();  
        
        return collect([
            'name' => data_get($response,'response.players.0.personaname'),
            'avatar' => data_get($response,'response.players.0.avatarmedium')
        ]);
    }


    public function getSteamReviews($steamid, $cursor = '*', $paginate = false, $language = 'english',$num_per_page = 10)
    {
        $response = Http::get('store.steampowered.com/appreviews/'.$steamid,[
            'json' => 1,
            'language' => $language,
            'num_per_page' => $num_per_page,
            'cursor' => $cursor,
        ])->collect();

        $reviews = collect($response['reviews'])->map(function($review){
            
            return [
                'steamid' => $review['author']['steamid'],
                'user' => $this->steamUserDetails($review['author']['steamid']),
                'language' => $review['language'],
                'review' => $this->stripBBCode($review['review']),
                'created_at' => Carbon::createFromTimestamp($review['timestamp_created'])->format('d.m.Y H:i:s'),
            ];
        });

        if($paginate){
            $reviewsData = collect([
                'cursor' => $response['cursor'],
                'reviews' => $reviews,
            ]);
        } else {
            $reviewsData = collect([
                'num_reviews' => $response['query_summary']['num_reviews'],
                'review_score' => $response['query_summary']['review_score'],
                'review_score_desc' => $response['query_summary']['review_score_desc'],
                'total_positive' => $response['query_summary']['total_positive'],
                'total_negative' => $response['query_summary']['total_negative'],
                'cursor' => $response['cursor'],
                'reviews' => $reviews,
            ]);                
           }

    return $reviewsData;
    }

    public function getGameDetails($steamid){
        $response = Http::get('https://store.steampowered.com/api/appdetails',[
            'appids' => $steamid,
            'cc' => 'de',
            'l' => 'de'
        ])->collect();

        return collect($response[$steamid]['data']);
    }

    function stripBBCode($text_to_search) {
        $pattern = '|[[\\/\\!]*?[^\\[\\]]*?]|si';
        $replace = '';
        return preg_replace($pattern, $replace, $text_to_search);
    }
}
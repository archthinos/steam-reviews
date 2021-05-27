<?php

namespace App\Models;

use App\Models\Product;
use App\Services\SteamService;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    public function products(){
        return $this->belongsTo(Product::class);
    }

    public static function storeReview($steamId){
        $review = Review::where('steamId',$steamId)->exists();
        
        if(!$review){
            $steam = new SteamService();
            $steamReviews = $steam->getSteamReviews($steamId);

            foreach($steamReviews['reviews'] as $review){
               
                Review::create([
                    'name' => $review['user']['name'],
                    'avatar' => $review['user']['avatar'],
                    'review' => $review['review'],
                    'steamId' => $steamId,
                ]);
            }

            SteamReview::create([
                'steamid' => $steamId,
                'num_reviews' => $steamReviews['num_reviews'],
                'review_score' => $steamReviews['review_score'],
                'review_score_desc' => $steamReviews['review_score_desc'],
                'total_positive' => $steamReviews['total_positive'],
                'total_negative' => $steamReviews['total_negative'],
                'cursor' => $steamReviews['cursor'],
                        
            ]);
        }
    }
    
}

<?php

namespace App\Models;

use App\Models\Review;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getShortDescriptionAttribute()
    {
        return Str::words($this->description, 16, ' ...');
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function steamReviews(){
        return $this->hasMany(SteamReview::class);
    }
}

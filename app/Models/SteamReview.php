<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SteamReview extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public $timestamps = false;

    public function products(){
        return $this->belongsTo(Product::class);
    }    
}

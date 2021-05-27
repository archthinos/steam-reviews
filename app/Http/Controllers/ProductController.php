<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Product;
use App\Models\SteamReview;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\SteamService;
use App\Http\Requests\ProductStoreRequest;

class ProductController extends Controller
{
    public function index(){
        return view('products.homepage',[
            'products' => Product::get(),
        ]);
    }

    public function show($slug,$cursor = 0)
    {
        $product = Product::where('slug',$slug)->first();

        return view('products.product',[
            'product' => $product,
            'reviews' => Review::where('steamId',$product->steamId)->get(),
            'steamReview' => SteamReview::where('steamId',$product->steamId)->first(),
        ]);
    }

    public function store(ProductStoreRequest $req){
        $steam = new SteamService();
        $gameDetails = $steam->getGameDetails($req->steamid);
        
        Product::create([
            'name' => $gameDetails['name'],
            'slug' => Str::slug($gameDetails['name']),
            'description' => $gameDetails['short_description'],
            'price' => Str::replaceFirst('€', '', $gameDetails['price_overview']['final_formatted']),
            'image' => $gameDetails['header_image'],
            'steamId' => $req->steamid,
        ]);

        Review::storeReview($req->steamid);

        return redirect()->route('home');
    }
}
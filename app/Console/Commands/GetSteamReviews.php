<?php

namespace App\Console\Commands;

use App\Models\Review;
use App\Models\Product;
use Illuminate\Console\Command;

class GetSteamReviews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reviews:steam {steamId?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get steam reviews to database. Possible get only one review with game SteamId ';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if($this->argument('steamId')){
            Review::storeReview($this->argument('steamId'));

        } else {
            $products = Product::all();
            $bar = $this->output->createProgressBar(count($products));
            $bar->start();

            foreach($products as $product){
                Review::storeReview($product->steamId);
                $bar->advance();
            }
            $bar->finish();
        }
    }
}

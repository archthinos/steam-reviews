<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSteamReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('steam_reviews', function (Blueprint $table) {
                $table->id();
                $table->unsignedInteger('steamid');
                $table->unsignedInteger('num_reviews');
                $table->unsignedInteger('review_score');
                $table->string('review_score_desc');
                $table->unsignedInteger('total_positive');
                $table->unsignedInteger('total_negative');
                $table->string('cursor');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('steam_reviews');
    }
}

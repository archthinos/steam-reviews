<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gameNames = array(
            'Assassin’s Creed 4: Black Flag ',
            'Cyberpunk 2077',
            'Blair Witch',
            'Detroit: Become Human',
        );

        $steamId = array(
            '242050',
            '1091500',
            '1092660',
            '1222140',
        );

        $images = array(
            'https://www.progamingshop.sk/images/data/product/cyberpunk-2077-cz-pc-code-in-a-box-379802.jpg',
            'https://www.progamingshop.sk/images/data/product/blair-witch-pc-dvd-405704.jpg',
            'https://www.progamingshop.sk/images/data/product/detroit-become-human-cz-collector-s-edition-pc-dvd-409091.jpg',
            'https://www.progamingshop.sk/images/data/product/assassin-s-creed-valhalla-limited-edition-ps4-408400.jpg',
        );

        $name = $this->faker->randomElement($gameNames);

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->realText(100),
            'price' => $this->faker->randomFloat(2),
            'image' => $this->faker->randomElement($images),
            'steamId' => $this->faker->randomElement($steamId),
        ];
    }
}

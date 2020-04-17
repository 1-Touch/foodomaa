<?php

use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->delete();
        DB::table('items')->truncate();

        $faker = Faker\Factory::create();
        $faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));
        for ($j = 1; $j < 501; $j++) {
            for ($i = 1; $i <= 60; $i++) {
                App\Item::create([
                    'restaurant_id' => $j,
                    'item_category_id' => rand(1, 5),
                    'name' => $faker->foodName(),
                    'price' => mt_rand(8, 25),
                    'image' => "/assets/img/items/demo/sm/" . $i . ".jpg",
                    'is_recommended' => $i < 5 ? 1 : 0,
                    'is_popular' => $i > 30 && $i < 40 ? rand(0, 1) : 0,
                    'is_new' => $i > 5 && $i < 20 ? rand(0, 1) : 0,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    "is_active" => 1,
                ]);
            }
        }
    }
}

<?php

use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->delete();
        DB::table('locations')->truncate();

        $locations = array(
            array(

                'name' => 'Toronto',
                'description' => "Near Some Place",
                'is_popular' => "1", "is_active" => "1",
            ),
            array(

                'name' => 'Vancouver',
                'description' => "Near Some Place",
                'is_popular' => "1", "is_active" => "1",
            ),
            array(

                'name' => 'Montreal',
                'description' => "Near Some Place",
                'is_popular' => "1", "is_active" => "1",
            ),
            array(

                'name' => 'Ontario',
                'description' => "Near Some Place",
                'is_popular' => "1", "is_active" => "1",
            ),
            array(

                'name' => 'Victoria',
                'description' => "Near Some Place",
                'is_popular' => "1", "is_active" => "1",
            ),
            array(

                'name' => 'Halifax',
                'description' => "Near Some Place",
                'is_popular' => "1", "is_active" => "1",
            ),
            array(

                'name' => 'Quebec City',
                'description' => "Near Some Place",
                'is_popular' => "1", "is_active" => "1",
            ),
            array(

                'name' => 'Calgary',
                'description' => "Near Some Place",
                'is_popular' => "1", "is_active" => "1",
            ),
            array(

                'name' => 'Ottawa',
                'description' => "Near Some Place",
                'is_popular' => "1", "is_active" => "1",
            ),
            array(

                'name' => 'Jakarta',
                'description' => "Near Some Place",
                'is_popular' => "0", "is_active" => "1",
            ),
            array(

                'name' => 'Bandung',
                'description' => "Near Some Place",
                'is_popular' => "0", "is_active" => "1",
            ),
            array(

                'name' => 'Surabaya',
                'description' => "Near Some Place",
                'is_popular' => "0", "is_active" => "1",
            ),
            array(

                'name' => 'Bali',
                'description' => "Near Some Place",
                'is_popular' => "0", "is_active" => "1",
            ),
            array(

                'name' => 'Depok',
                'description' => "Near Some Place",
                'is_popular' => "0", "is_active" => "1",
            ),
            array(

                'name' => 'Manado',
                'description' => "Near Some Place",
                'is_popular' => "0", "is_active" => "1",
            ),
            array(

                'name' => 'Semarang',
                'description' => "Near Some Place",
                'is_popular' => "0", "is_active" => "1",
            ),
            array(

                'name' => 'Lombok',
                'description' => "Near Some Place",
                'is_popular' => "0", "is_active" => "1",
            ),
            array(

                'name' => 'George Town',
                'description' => "Near Some Place",
                'is_popular' => "0", "is_active" => "1",
            ),
            array(

                'name' => 'Kuala Lumpur',
                'description' => "Near Some Place",
                'is_popular' => "0", "is_active" => "1",
            ),
            array(

                'name' => 'Ipoh',
                'description' => "Near Some Place",
                'is_popular' => "0", "is_active" => "1",
            ),
            array(

                'name' => 'Kuching',
                'description' => "Near Some Place",
                'is_popular' => "0", "is_active" => "1",
            ),
            array(

                'name' => 'Johor Bahru',
                'description' => "Near Some Place",
                'is_popular' => "0", "is_active" => "1",
            ),
            array(

                'name' => 'Kota Kinabalu',
                'description' => "Near Some Place",
                'is_popular' => "0", "is_active" => "1",
            ),
            array(

                'name' => 'Shah Alam',
                'description' => "Near Some Place",
                'is_popular' => "0", "is_active" => "1",
            ),
            array(

                'name' => 'New York',
                'description' => "Near Some Place",
                'is_popular' => "0", "is_active" => "1",
            ),
            array(

                'name' => 'San Francisco',
                'description' => "Near Some Place",
                'is_popular' => "0", "is_active" => "1",
            ),
            array(

                'name' => 'Los Angeles',
                'description' => "Near Some Place",
                'is_popular' => "0", "is_active" => "1",
            ),
            array(

                'name' => 'Seattle',
                'description' => "Near Some Place",
                'is_popular' => "0", "is_active" => "1",
            ),
            array(

                'name' => 'Chicago',
                'description' => "Near Some Place",
                'is_popular' => "0", "is_active" => "1",
            ),
            array(

                'name' => 'Boston',
                'description' => "Near Some Place",
                'is_popular' => "0", "is_active" => "1",
            ),
        );
        DB::table('locations')->insert($locations);
    }
}

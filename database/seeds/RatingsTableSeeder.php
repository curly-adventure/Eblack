<?php

use Illuminate\Database\Seeder;

class RatingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ratings')->delete();
        
        \DB::table('ratings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'created_at' => '2020-08-16 14:01:26',
                'updated_at' => '2020-08-16 14:01:26',
                'rating' => 4,
                'rateable_type' => 'App\\Produits',
                'rateable_id' => 5,
                'user_id' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'created_at' => '2020-08-16 14:01:54',
                'updated_at' => '2020-08-16 14:01:54',
                'rating' => 5,
                'rateable_type' => 'App\\Produits',
                'rateable_id' => 9,
                'user_id' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'created_at' => '2020-08-16 14:02:20',
                'updated_at' => '2020-08-16 14:02:20',
                'rating' => 4,
                'rateable_type' => 'App\\Produits',
                'rateable_id' => 8,
                'user_id' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'created_at' => '2020-08-16 14:03:04',
                'updated_at' => '2020-08-16 14:03:04',
                'rating' => 4,
                'rateable_type' => 'App\\Produits',
                'rateable_id' => 12,
                'user_id' => 1,
            ),
        ));
        
        
    }
}
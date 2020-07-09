<?php

use Illuminate\Database\Seeder;

class WishlistTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('wishlist')->delete();
        
        \DB::table('wishlist')->insert(array (
            0 => 
            array (
                'id' => 2,
                'user_id' => 1,
                'model_type' => 'App\\Produits',
                'model_id' => 1,
                'collection_name' => 'default',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 3,
                'user_id' => 1,
                'model_type' => 'App\\Produits',
                'model_id' => 3,
                'collection_name' => 'default',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}
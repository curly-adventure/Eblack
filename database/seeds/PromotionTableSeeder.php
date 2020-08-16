<?php

use Illuminate\Database\Seeder;

class PromotionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('promotion')->delete();
        
        \DB::table('promotion')->insert(array (
            0 => 
            array (
                'id' => 1,
                'marque_id' => 2,
                'titre' => 'promo01',
                'percent' => 10,
                'deleted_at' => NULL,
                'created_at' => '2020-08-07 11:34:57',
                'updated_at' => '2020-08-07 11:34:57',
            ),
        ));
        
        
    }
}
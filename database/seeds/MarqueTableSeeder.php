<?php

use Illuminate\Database\Seeder;

class MarqueTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('Marque')->delete();
        
        \DB::table('Marque')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nom' => 'Nike',
                'logo' => 'logo/e6f252a81186aa4f6e43b6f842e2cbb1.png',
                'deleted_at' => NULL,
                'created_at' => '2020-06-04 23:48:51',
                'updated_at' => '2020-06-04 23:48:51',
            ),
        ));
        
        
    }
}
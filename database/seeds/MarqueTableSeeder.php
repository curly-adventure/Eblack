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
        

        \DB::table('marque')->delete();
        
        \DB::table('marque')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nom' => 'defaut',
                'logo' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-06-04 23:48:51',
                'updated_at' => '2020-06-05 21:02:10',
            ),
            1 => 
            array (
                'id' => 2,
                'nom' => 'Eshop',
                'logo' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-06-05 21:03:59',
                'updated_at' => '2020-08-16 12:04:30',
            ),
            2 => 
            array (
                'id' => 3,
                'nom' => 'buzz',
                'logo' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-08-16 12:05:02',
                'updated_at' => '2020-08-16 12:05:02',
            ),
        ));
        
        
    }
}
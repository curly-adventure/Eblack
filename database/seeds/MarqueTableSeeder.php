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
                'nom' => 'defaut',
                'logo' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-06-04 23:48:51',
                'updated_at' => '2020-06-05 21:02:10',
            ),
            1 => 
            array (
                'id' => 2,
                'nom' => 'nike',
                'logo' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-06-05 21:03:59',
                'updated_at' => '2020-06-05 21:03:59',
            ),
        ));
        
        
    }
}
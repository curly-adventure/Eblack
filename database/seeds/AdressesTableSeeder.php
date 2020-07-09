<?php

use Illuminate\Database\Seeder;

class AdressesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('adresses')->delete();
        
        \DB::table('adresses')->insert(array (
            0 => 
            array (
                'id' => 3,
                'client_id' => 1,
                'commune_id' => 2,
                'description' => 'toit rouge derrière maquis gnanwa',
                'deleted_at' => NULL,
                'created_at' => '2020-07-06 19:21:20',
                'updated_at' => '2020-07-06 19:21:20',
            ),
            1 => 
            array (
                'id' => 4,
                'client_id' => 2,
                'commune_id' => 3,
                'description' => 'angré terminus 82',
                'deleted_at' => NULL,
                'created_at' => '2020-07-06 19:22:20',
                'updated_at' => '2020-07-06 19:24:09',
            ),
        ));
        
        
    }
}
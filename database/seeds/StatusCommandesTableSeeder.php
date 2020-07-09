<?php

use Illuminate\Database\Seeder;

class StatusCommandesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('status_commandes')->delete();
        
        \DB::table('status_commandes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nom' => 'Attente',
                'created_at' => '2020-07-06 19:59:03',
                'updated_at' => '2020-07-06 19:59:05',
            ),
            1 => 
            array (
                'id' => 2,
                'nom' => 'Traitement',
                'created_at' => '2020-07-06 19:59:43',
                'updated_at' => '2020-07-06 19:59:44',
            ),
            2 => 
            array (
                'id' => 3,
                'nom' => 'Livrer',
                'created_at' => '2020-07-06 20:00:04',
                'updated_at' => '2020-07-06 20:00:05',
            ),
            3 => 
            array (
                'id' => 4,
                'nom' => 'Annuler',
                'created_at' => '2020-07-06 20:00:31',
                'updated_at' => '2020-07-06 20:00:32',
            ),
            4 => 
            array (
                'id' => 5,
                'nom' => 'Terminer',
                'created_at' => '2020-07-06 20:00:54',
                'updated_at' => '2020-07-06 20:00:55',
            ),
        ));
        
        
    }
}
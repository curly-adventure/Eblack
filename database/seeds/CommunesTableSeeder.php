<?php

use Illuminate\Database\Seeder;

class CommunesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('Communes')->delete();
        
        \DB::table('Communes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nom' => 'koumassi',
                'ville_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-06-02 18:17:15',
                'updated_at' => '2020-06-02 18:17:15',
            ),
            1 => 
            array (
                'id' => 2,
                'nom' => 'yopougon',
                'ville_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-06-02 18:17:24',
                'updated_at' => '2020-06-02 18:17:24',
            ),
            2 => 
            array (
                'id' => 3,
                'nom' => 'Cocody',
                'ville_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-06-02 18:17:33',
                'updated_at' => '2020-06-02 18:17:33',
            ),
            3 => 
            array (
                'id' => 4,
                'nom' => 'Abobo',
                'ville_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-06-02 18:17:40',
                'updated_at' => '2020-06-02 18:17:40',
            ),
            4 => 
            array (
                'id' => 5,
                'nom' => '2 plateaux',
                'ville_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-06-02 18:17:47',
                'updated_at' => '2020-06-02 18:17:47',
            ),
            5 => 
            array (
                'id' => 6,
                'nom' => 'Port bouet',
                'ville_id' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-06-02 18:17:57',
                'updated_at' => '2020-06-02 18:17:57',
            ),
        ));
        
        
    }
}
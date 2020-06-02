<?php

use Illuminate\Database\Seeder;

class VillesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('Villes')->delete();
        
        \DB::table('Villes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nom' => 'Abidjan',
                'deleted_at' => NULL,
                'created_at' => '2020-06-02 18:17:05',
                'updated_at' => '2020-06-02 18:17:05',
            ),
        ));
        
        
    }
}
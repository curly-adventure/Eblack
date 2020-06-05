<?php

use Illuminate\Database\Seeder;

class CategorieTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('Categorie')->delete();
        
        \DB::table('Categorie')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nom' => 'Mode Homme',
                'logo' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-06-05 20:44:07',
                'updated_at' => '2020-06-05 20:44:07',
            ),
            1 => 
            array (
                'id' => 2,
                'nom' => 'Mode Enfant',
                'logo' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-06-05 20:44:07',
                'updated_at' => '2020-06-05 20:44:07',
            ),
            2 => 
            array (
                'id' => 3,
                'nom' => 'Mode Femme',
                'logo' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-06-05 20:44:07',
                'updated_at' => '2020-06-05 20:44:07',
            ),
        ));
        
        
    }
}
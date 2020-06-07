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
                'logo' => 'logo/3f2067d6db77d9e682958d3ac547a034.jpg',
                'deleted_at' => NULL,
                'created_at' => '2020-06-05 20:44:07',
                'updated_at' => '2020-06-06 00:28:15',
            ),
            1 => 
            array (
                'id' => 2,
                'nom' => 'Mode Enfant',
                'logo' => 'logo/06634d45ed670169dff65aae7a3b4bc8.jpg',
                'deleted_at' => NULL,
                'created_at' => '2020-06-05 20:44:07',
                'updated_at' => '2020-06-06 00:27:48',
            ),
            2 => 
            array (
                'id' => 3,
                'nom' => 'Mode Femme',
                'logo' => 'logo/16149189c4e3f206bda1467e3eac3b2d.jpg',
                'deleted_at' => NULL,
                'created_at' => '2020-06-05 20:44:07',
                'updated_at' => '2020-06-06 00:26:31',
            ),
        ));
        
        
    }
}
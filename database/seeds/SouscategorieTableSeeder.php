<?php

use Illuminate\Database\Seeder;

class SousCategorieTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sousCategorie')->delete();
        
        \DB::table('sousCategorie')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nom' => 'Vêtement',
                'logo' => 'logo/6ad0a08b0e030551d682950243eb066c.png',
                'deleted_at' => NULL,
                'created_at' => '2020-06-05 20:44:07',
                'updated_at' => '2020-06-05 21:42:35',
            ),
            1 => 
            array (
                'id' => 2,
                'nom' => 'Chaussure',
                'logo' => 'logo/01f640fd2a3d10e0c9a31a970fb43835.jpg',
                'deleted_at' => NULL,
                'created_at' => '2020-06-05 20:44:07',
                'updated_at' => '2020-06-05 21:42:03',
            ),
            2 => 
            array (
                'id' => 3,
                'nom' => 'Accessoire',
                'logo' => 'logo/068324dae41d6307be87d6175dcd92ea.jpg',
                'deleted_at' => NULL,
                'created_at' => '2020-06-05 20:44:08',
                'updated_at' => '2020-06-05 21:41:44',
            ),
        ));
        
        
    }
}
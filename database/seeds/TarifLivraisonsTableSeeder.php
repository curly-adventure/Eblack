<?php

use Illuminate\Database\Seeder;

class TarifLivraisonsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tarif_livraisons')->delete();
        
        \DB::table('tarif_livraisons')->insert(array (
            0 => 
            array (
                'id' => 1,
                'commune_id' => 1,
                'prix' => '1500',
                'deleted_at' => NULL,
                'created_at' => '2020-07-16 16:13:29',
                'updated_at' => '2020-07-16 16:13:29',
            ),
            1 => 
            array (
                'id' => 3,
                'commune_id' => 3,
                'prix' => '1500',
                'deleted_at' => NULL,
                'created_at' => '2020-07-16 16:14:02',
                'updated_at' => '2020-07-16 16:14:02',
            ),
            2 => 
            array (
                'id' => 4,
                'commune_id' => 2,
                'prix' => '1500',
                'deleted_at' => NULL,
                'created_at' => '2020-07-16 16:17:41',
                'updated_at' => '2020-07-16 16:17:41',
            ),
        ));
        
        
    }
}
<?php

use Illuminate\Database\Seeder;

class SlidersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sliders')->delete();
        
        \DB::table('sliders')->insert(array (
            0 => 
            array (
                'id' => 1,
                'categorie_id' => 1,
                'sous_categorie_id' => 2,
                'titre' => 'Chaussures',
                'image' => 'slider/785ee58bb76096b2579b7504ba3ec4cc.jpg',
                'deleted_at' => NULL,
                'created_at' => '2020-07-16 16:05:00',
                'updated_at' => '2020-07-16 16:05:00',
            ),
            1 => 
            array (
                'id' => 2,
                'categorie_id' => 2,
                'sous_categorie_id' => NULL,
                'titre' => 'Casque Audio',
                'image' => 'slider/dc23b98d8fcdc414cfb7bbe06f652684.jpg',
                'deleted_at' => NULL,
                'created_at' => '2020-07-16 16:05:37',
                'updated_at' => '2020-07-16 16:05:37',
            ),
            2 => 
            array (
                'id' => 3,
                'categorie_id' => NULL,
                'sous_categorie_id' => NULL,
                'titre' => 'Ordinateur',
                'image' => 'slider/0f0257534ec02d9d31a31894fd114fba.jpg',
                'deleted_at' => NULL,
                'created_at' => '2020-07-16 16:06:16',
                'updated_at' => '2020-07-16 16:06:16',
            ),
        ));
        
        
    }
}
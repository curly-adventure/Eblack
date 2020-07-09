<?php

use Illuminate\Database\Seeder;

class AchatProduitsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('achat_produits')->delete();
        
        \DB::table('achat_produits')->insert(array (
            0 => 
            array (
                'id' => 4,
                'achat_id' => 3,
                'produit_id' => 7,
                'nom' => 't-shirt noir',
                'prix' => 7000,
                'quantite' => 1,
                'created_at' => '2020-07-08 10:54:02',
                'updated_at' => '2020-07-08 10:54:02',
            ),
            1 => 
            array (
                'id' => 5,
                'achat_id' => 3,
                'produit_id' => 5,
                'nom' => 't-shirt',
                'prix' => 7000,
                'quantite' => 3,
                'created_at' => '2020-07-08 10:54:02',
                'updated_at' => '2020-07-08 10:54:02',
            ),
            2 => 
            array (
                'id' => 6,
                'achat_id' => 3,
                'produit_id' => 1,
                'nom' => 'veste nike swoosh gris',
                'prix' => 24000,
                'quantite' => 1,
                'created_at' => '2020-07-08 10:54:02',
                'updated_at' => '2020-07-08 10:54:02',
            ),
            3 => 
            array (
                'id' => 7,
                'achat_id' => 4,
                'produit_id' => 5,
                'nom' => 't-shirt',
                'prix' => 7000,
                'quantite' => 3,
                'created_at' => '2020-07-08 11:16:19',
                'updated_at' => '2020-07-08 11:16:19',
            ),
            4 => 
            array (
                'id' => 8,
                'achat_id' => 4,
                'produit_id' => 3,
                'nom' => 'basket blanche',
                'prix' => 78000,
                'quantite' => 1,
                'created_at' => '2020-07-08 11:16:19',
                'updated_at' => '2020-07-08 11:16:19',
            ),
        ));
        
        
    }
}
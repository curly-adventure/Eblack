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
                'id' => 9,
                'achat_id' => 5,
                'produit_id' => 5,
                'nom' => 't-shirt',
                'prix' => 11000,
                'quantite' => 2,
                'created_at' => '2020-08-16 14:04:36',
                'updated_at' => '2020-08-16 14:04:36',
            ),
            1 => 
            array (
                'id' => 10,
                'achat_id' => 5,
                'produit_id' => 9,
                'nom' => 'sac a main rose',
                'prix' => 23000,
                'quantite' => 1,
                'created_at' => '2020-08-16 14:04:37',
                'updated_at' => '2020-08-16 14:04:37',
            ),
            2 => 
            array (
                'id' => 11,
                'achat_id' => 5,
                'produit_id' => 12,
                'nom' => 'chemise bleu',
                'prix' => 4200,
                'quantite' => 1,
                'created_at' => '2020-08-16 14:04:37',
                'updated_at' => '2020-08-16 14:04:37',
            ),
        ));
        
        
    }
}
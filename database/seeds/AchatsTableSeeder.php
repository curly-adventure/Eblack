<?php

use Illuminate\Database\Seeder;

class AchatsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('achats')->delete();
        
        \DB::table('achats')->insert(array (
            0 => 
            array (
                'id' => 3,
                'num_achat' => 1001,
                'montant' => 32000,
                'quantite' => 5,
                'client_id' => 1,
                'adresse_id' => 3,
                'methode_paiement' => 'paiement cash à la livraison',
                'status_id' => 1,
                'canceled' => 0,
                'deleted_at' => NULL,
                'created_at' => '2020-07-08 10:54:02',
                'updated_at' => '2020-07-08 10:54:02',
            ),
            1 => 
            array (
                'id' => 4,
                'num_achat' => 1002,
                'montant' => 59996,
                'quantite' => 4,
                'client_id' => 2,
                'adresse_id' => 4,
                'methode_paiement' => 'paiement cash à la livraison',
                'status_id' => 1,
                'canceled' => 0,
                'deleted_at' => NULL,
                'created_at' => '2020-07-08 11:16:19',
                'updated_at' => '2020-07-08 11:16:19',
            ),
        ));
        
        
    }
}
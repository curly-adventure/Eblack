<?php

use Illuminate\Database\Seeder;

class ProduitsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('Produits')->delete();
        
        /*Produits::create([
            'nom' => 'veste nike',
            'prix_achat' =>'50000',
            'prix_vente'=>'50000',
            'enligne'=>'oui',
            'quantite'=>40,
            'Categorie_id'=>1,
            'sousCategorie_id'=>0,
            'Marque_id'=>0,
            'description'=>"veste homme nike noir"
            ]);*/
        
    }
}
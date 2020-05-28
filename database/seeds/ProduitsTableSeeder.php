<?php

use Illuminate\Database\Seeder;
use App\Produits;
class ProduitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Produits::create([
            'nom' => 'basket bleu',
            'prix_achat' =>'5000',
            'prix_vente'=>'5000',
            'enligne'=>'oui',
            'quantite'=>40,
            'Categorie_id'=>4,
            'sousCategorie_id'=>0,
            'Marque_id'=>0,
            'description'=>"basket bleu"
            ]);
    }
}

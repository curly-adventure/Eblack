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
            'nom' => 'veste nike',
            'prix_achat' =>'50000',
            'prix_vente'=>'50000',
            'enligne'=>'oui',
            'quantite'=>40,
            'Categorie_id'=>1,
            'sousCategorie_id'=>0,
            'Marque_id'=>0,
            'description'=>"veste homme nike noir"
            ]);
    }
}

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
        
        \DB::table('Produits')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nom' => 'veste nike swoosh gris',
                'images' => '["produits\\/2f19de91ba9bb6d8885c6083d1523c05.jpeg"]',
                'prix_achat' => 24000,
                'prix_vente' => 12000,
                'quantite' => 5,
                'categorie_id' => 1,
                'sous_categorie_id' => 1,
                'marque_id' => 2,
                'description' => '<p>Veste nike noir pour homme</p>

<ul>
<li>100 % coton</li>
<li>export&eacute; de France</li>
</ul>',
                'enligne' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-06-05 20:55:24',
                'updated_at' => '2020-06-05 21:22:31',
            ),
            1 => 
            array (
                'id' => 2,
                'nom' => 'escarpin-rouge',
                'images' => '["produits\\/2749f0a3d3e9dab9f3cd3ab2c63d4c22.jpg","produits\\/18884676665a04a3426d20310f97ed79.jpg"]',
                'prix_achat' => 450000,
                'prix_vente' => 32500,
                'quantite' => 3,
                'categorie_id' => 3,
                'sous_categorie_id' => 2,
                'marque_id' => 1,
                'description' => '<p>chaussure feminine, talon haute taille</p>

<ol>
<li>couleur : rouge</li>
<li>toutes les taille</li>
</ol>',
                'enligne' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-06-05 21:06:45',
                'updated_at' => '2020-06-05 21:18:01',
            ),
            2 => 
            array (
                'id' => 3,
                'nom' => 'basket blanche',
                'images' => '["produits\\/d0cf1e9c58eedde24708c6aa474b9e13.jpg"]',
                'prix_achat' => 78000,
                'prix_vente' => 44996,
                'quantite' => 10,
                'categorie_id' => 1,
                'sous_categorie_id' => 2,
                'marque_id' => 1,
                'description' => '<p>chaussure blanche pour homme</p>',
                'enligne' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-06-05 21:10:29',
                'updated_at' => '2020-06-05 21:10:29',
            ),
            3 => 
            array (
                'id' => 4,
                'nom' => 'culotte jeans',
                'images' => '[]',
                'prix_achat' => 10000,
                'prix_vente' => 8000,
                'quantite' => 6,
                'categorie_id' => 1,
                'sous_categorie_id' => 1,
                'marque_id' => 1,
                'description' => '<p>culotte jeans frais</p>',
                'enligne' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-06-05 21:11:50',
                'updated_at' => '2020-06-05 21:11:50',
            ),
            4 => 
            array (
                'id' => 5,
                'nom' => 't-shirt',
                'images' => '["produits\\/2414142d8b748a40979158d8d32ee6ec.png","produits\\/b1c2ec73b1f5849348509af1370f8ab9.png","produits\\/c047e13a14c11531f0fa4491a9aac417.png"]',
                'prix_achat' => 7000,
                'prix_vente' => 5000,
                'quantite' => 25,
                'categorie_id' => 1,
                'sous_categorie_id' => 1,
                'marque_id' => 1,
                'description' => '<p>T-shirt pour homme, femme et enfant</p>

<ul>
<li>pure coton</li>
<li>plusieurs couleurs</li>
<li>plusieurs taille</li>
</ul>',
                'enligne' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-06-05 21:16:18',
                'updated_at' => '2020-06-05 21:16:52',
            ),
            5 => 
            array (
                'id' => 7,
                'nom' => 't-shirt noir',
                'images' => '["produits\\/883e91631e133845d5659c302a659fb0.png","produits\\/2cdb5e525a075a07e1a1da8ed2639b2d.png","produits\\/abb89f9641fce5b4c7d7a5d8d86ecfb7.png"]',
                'prix_achat' => 7000,
                'prix_vente' => 5000,
                'quantite' => 25,
                'categorie_id' => 2,
                'sous_categorie_id' => 1,
                'marque_id' => 1,
                'description' => '<p>T-shirt pour homme, enfant</p>

<ul>
<li>pure coton</li>
<li>plusieurs couleurs</li>
<li>plusieurs taille</li>
</ul>',
                'enligne' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-06-05 21:21:36',
                'updated_at' => '2020-06-05 21:21:36',
            ),
        ));
        
        
    }
}
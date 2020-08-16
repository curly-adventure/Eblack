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
        

        \DB::table('produits')->delete();
        
        \DB::table('produits')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nom' => 'veste nike swoosh gris',
                'images' => '["produits\\/4214f828c8187e856c436825f525d1cc.jpeg"]',
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
                'faux_percent' => NULL,
                'vrai_percent' => NULL,
                'personnalisable' => 1,
                'enligne' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-06-05 20:55:24',
                'updated_at' => '2020-06-06 00:38:24',
            ),
            1 => 
            array (
                'id' => 2,
                'nom' => 'escarpin-rouge',
                'images' => '["produits\\/9cfc6f477c6e932088ff79880caa6124.jpg","produits\\/3825893adcc1bf7fb4abe0753ce4bbf1.jpg"]',
                'prix_achat' => 450000,
                'prix_vente' => 585000,
                'quantite' => 3,
                'categorie_id' => 3,
                'sous_categorie_id' => 2,
                'marque_id' => 1,
                'description' => '<p>chaussure feminine, talon haute taille</p>

<ol>
<li>couleur : rouge</li>
<li>toutes les taille</li>
</ol>',
                'faux_percent' => NULL,
                'vrai_percent' => NULL,
                'personnalisable' => 0,
                'enligne' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-06-05 21:06:45',
                'updated_at' => '2020-08-09 14:19:00',
            ),
            2 => 
            array (
                'id' => 3,
                'nom' => 'basket blanche',
                'images' => '["produits\\/3a15fe542eab4d56440c5ac04c02bfa7.jpg"]',
                'prix_achat' => 50000,
                'prix_vente' => 60000,
                'quantite' => 2,
                'categorie_id' => 1,
                'sous_categorie_id' => 2,
                'marque_id' => 1,
                'description' => '<p>chaussure blanche pour homme</p>',
                'faux_percent' => NULL,
                'vrai_percent' => NULL,
                'personnalisable' => 0,
                'enligne' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-06-05 21:10:29',
                'updated_at' => '2020-08-10 09:05:48',
            ),
            3 => 
            array (
                'id' => 4,
                'nom' => 'culotte jeans',
                'images' => '["produits\\/76893a855b8c71cfe9f2914ad418d9a6.jpg"]',
                'prix_achat' => 10000,
                'prix_vente' => 11000,
                'quantite' => 2,
                'categorie_id' => 1,
                'sous_categorie_id' => 1,
                'marque_id' => 1,
                'description' => '<p>culotte jeans frais</p>',
                'faux_percent' => NULL,
                'vrai_percent' => NULL,
                'personnalisable' => 1,
                'enligne' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-06-05 21:11:50',
                'updated_at' => '2020-08-09 14:19:00',
            ),
            4 => 
            array (
                'id' => 5,
                'nom' => 't-shirt',
                'images' => '["produits\\/a0829dc634c687c727279bb15ea08cfb.png","produits\\/49768744b840ad7135fa3514a307da3c.png","produits\\/ec98fc623dcfa5e8f2feef5d5e693fc5.png"]',
                'prix_achat' => 10000,
                'prix_vente' => 11000,
                'quantite' => 5,
                'categorie_id' => 1,
                'sous_categorie_id' => 1,
                'marque_id' => 1,
                'description' => '<p>T-shirt pour homme et enfant</p>

<ul>
<li>pure coton</li>
<li>plusieurs couleurs</li>
<li>plusieurs taille</li>
</ul>',
                'faux_percent' => '10',
                'vrai_percent' => NULL,
                'personnalisable' => 1,
                'enligne' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-06-05 21:16:18',
                'updated_at' => '2020-08-09 14:19:00',
            ),
            5 => 
            array (
                'id' => 7,
                'nom' => 't-shirt noir',
                'images' => '["produits\\/03ba4770b2f0c8a66d91b85793ba8332.png","produits\\/33aa80bbdcacc9569e10ef08a563d243.png","produits\\/aa4144df44c0b79377d5b721e133891f.png"]',
                'prix_achat' => 7000,
                'prix_vente' => 7700,
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
                'faux_percent' => NULL,
                'vrai_percent' => NULL,
                'personnalisable' => 0,
                'enligne' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-06-05 21:21:36',
                'updated_at' => '2020-08-09 14:19:00',
            ),
        ));
        
        
    }
}
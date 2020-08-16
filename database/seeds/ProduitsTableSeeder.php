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
                'prix_vente' => 27600,
                'quantite' => 5,
                'categorie_id' => 1,
                'sous_categorie_id' => 1,
                'marque_id' => 3,
                'description' => '<p>Veste nike noir pour homme</p>

<ul>
<li>100 % coton</li>
<li>export&eacute; de France</li>
</ul>',
                'faux_percent' => NULL,
                'vrai_percent' => NULL,
                'personnalisable' => 0,
                'uniquement_personnalisable' => 0,
                'enligne' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-06-05 20:55:24',
                'updated_at' => '2020-08-16 12:21:49',
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
                'marque_id' => 2,
                'description' => '<p>chaussure feminine, talon haute taille</p>',
                'faux_percent' => NULL,
                'vrai_percent' => NULL,
                'personnalisable' => 0,
                'uniquement_personnalisable' => 0,
                'enligne' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-06-05 21:06:45',
                'updated_at' => '2020-08-16 13:16:58',
            ),
            2 => 
            array (
                'id' => 3,
                'nom' => 'basket blanche',
                'images' => '["produits\\/3a15fe542eab4d56440c5ac04c02bfa7.jpg"]',
                'prix_achat' => 50000,
                'prix_vente' => 60000,
                'quantite' => -12,
                'categorie_id' => 1,
                'sous_categorie_id' => 2,
                'marque_id' => 3,
                'description' => '<p>chaussure blanche pour homme</p>',
                'faux_percent' => '3',
                'vrai_percent' => NULL,
                'personnalisable' => 0,
                'uniquement_personnalisable' => 0,
                'enligne' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-06-05 21:10:29',
                'updated_at' => '2020-08-16 12:20:43',
            ),
            3 => 
            array (
                'id' => 4,
                'nom' => 'culotte jeans',
                'images' => '["produits\\/76893a855b8c71cfe9f2914ad418d9a6.jpg"]',
                'prix_achat' => 10000,
                'prix_vente' => 11000,
                'quantite' => 10,
                'categorie_id' => 2,
                'sous_categorie_id' => 1,
                'marque_id' => 2,
                'description' => '<p>culotte jeans&nbsp;</p>',
                'faux_percent' => NULL,
                'vrai_percent' => NULL,
                'personnalisable' => 0,
                'uniquement_personnalisable' => 0,
                'enligne' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-06-05 21:11:50',
                'updated_at' => '2020-08-16 12:20:01',
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
                'marque_id' => 3,
                'description' => '<p>T-shirt pour homme et enfant</p>

<ul>
<li>pure coton</li>
<li>plusieurs couleurs</li>
<li>plusieurs taille</li>
</ul>',
                'faux_percent' => '10',
                'vrai_percent' => NULL,
                'personnalisable' => 1,
                'uniquement_personnalisable' => 0,
                'enligne' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-06-05 21:16:18',
                'updated_at' => '2020-08-16 12:07:10',
            ),
            5 => 
            array (
                'id' => 7,
                'nom' => 't-shirt noir',
                'images' => '["produits\\/03ba4770b2f0c8a66d91b85793ba8332.png","produits\\/33aa80bbdcacc9569e10ef08a563d243.png","produits\\/aa4144df44c0b79377d5b721e133891f.png"]',
                'prix_achat' => 7000,
                'prix_vente' => 7700,
                'quantite' => 10,
                'categorie_id' => 1,
                'sous_categorie_id' => 1,
                'marque_id' => 2,
                'description' => '<p>T-shirt pour homme, enfant</p>

<ul>
<li>pure coton</li>
<li>plusieurs couleurs</li>
<li>plusieurs taille</li>
</ul>',
                'faux_percent' => '5',
                'vrai_percent' => NULL,
                'personnalisable' => 0,
                'uniquement_personnalisable' => 0,
                'enligne' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-06-05 21:21:36',
                'updated_at' => '2020-08-16 12:06:21',
            ),
            6 => 
            array (
                'id' => 8,
                'nom' => 'montre',
                'images' => '["produits\\/9de2ef7651ca0e403fcee5c35b2766c3.jpg"]',
                'prix_achat' => 15000,
                'prix_vente' => 17250,
                'quantite' => 5,
                'categorie_id' => 2,
                'sous_categorie_id' => 3,
                'marque_id' => 2,
                'description' => '<p>montre pour enfant</p>',
                'faux_percent' => NULL,
                'vrai_percent' => NULL,
                'personnalisable' => 0,
                'uniquement_personnalisable' => 0,
                'enligne' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-08-16 12:30:48',
                'updated_at' => '2020-08-16 12:32:15',
            ),
            7 => 
            array (
                'id' => 9,
                'nom' => 'sac a main rose',
                'images' => '["produits\\/a97556f60f7e9287552b92d492bb5cdf.jpg"]',
                'prix_achat' => 20000,
                'prix_vente' => 23000,
                'quantite' => 13,
                'categorie_id' => 3,
                'sous_categorie_id' => 3,
                'marque_id' => 1,
                'description' => '<p>sac a main rosse</p>

<ul>
<li>blablablab</li>
<li>blblblblb</li>
</ul>',
                'faux_percent' => NULL,
                'vrai_percent' => NULL,
                'personnalisable' => 0,
                'uniquement_personnalisable' => 0,
                'enligne' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-08-16 12:34:23',
                'updated_at' => '2020-08-16 12:34:38',
            ),
            8 => 
            array (
                'id' => 10,
                'nom' => 'chemeise blanche pour femme',
                'images' => '["produits\\/8dcb4afecfb5900d8c90ac46dcd269c1.jpg","produits\\/d9c2c6513bf397337e98f7ef6e3b94b7.jpg"]',
                'prix_achat' => 15000,
                'prix_vente' => 17250,
                'quantite' => 12,
                'categorie_id' => 3,
                'sous_categorie_id' => 1,
                'marque_id' => 2,
                'description' => '<p>chemise blanche pour femme</p>

<ul>
<li>pure coton</li>
<li>excellente qualit&eacute;</li>
</ul>',
                'faux_percent' => NULL,
                'vrai_percent' => NULL,
                'personnalisable' => 0,
                'uniquement_personnalisable' => 0,
                'enligne' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-08-16 12:36:33',
                'updated_at' => '2020-08-16 12:49:16',
            ),
            9 => 
            array (
                'id' => 11,
                'nom' => 'pull-over',
                'images' => '["produits\\/ce9190052845498b9894428732c94262.jpg"]',
                'prix_achat' => 20000,
                'prix_vente' => 23000,
                'quantite' => 5,
                'categorie_id' => 1,
                'sous_categorie_id' => 1,
                'marque_id' => 3,
                'description' => '<p>pull over</p>',
                'faux_percent' => '4',
                'vrai_percent' => NULL,
                'personnalisable' => 0,
                'uniquement_personnalisable' => 0,
                'enligne' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-08-16 12:37:58',
                'updated_at' => '2020-08-16 12:37:58',
            ),
            10 => 
            array (
                'id' => 12,
                'nom' => 'chemise bleu',
                'images' => '["produits\\/a26b889d03ca757894f1825d8f174b57.jpg"]',
                'prix_achat' => 4000,
                'prix_vente' => 4200,
                'quantite' => 15,
                'categorie_id' => 2,
                'sous_categorie_id' => 1,
                'marque_id' => 2,
                'description' => '<p>chemise bleu pour enfant</p>

<ul>
<li>confortable</li>
<li>cool</li>
</ul>',
                'faux_percent' => NULL,
                'vrai_percent' => NULL,
                'personnalisable' => 0,
                'uniquement_personnalisable' => 0,
                'enligne' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-08-16 12:39:08',
                'updated_at' => '2020-08-16 12:39:08',
            ),
            11 => 
            array (
                'id' => 13,
                'nom' => 'montre feminine',
                'images' => '["produits\\/82fdf381a1bf03eca37b6984d20f292d.jpg"]',
                'prix_achat' => 12000,
                'prix_vente' => 13800,
                'quantite' => 10,
                'categorie_id' => 3,
                'sous_categorie_id' => 3,
                'marque_id' => 2,
                'description' => '<p>montre pour femme</p>',
                'faux_percent' => NULL,
                'vrai_percent' => NULL,
                'personnalisable' => 0,
                'uniquement_personnalisable' => 0,
                'enligne' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-08-16 12:42:48',
                'updated_at' => '2020-08-16 12:54:47',
            ),
            12 => 
            array (
                'id' => 14,
                'nom' => 'chaussure nike rouge',
                'images' => '["produits\\/e5f68918dd75c8201d9feeb68026b10b.jpg"]',
                'prix_achat' => 45000,
                'prix_vente' => 54000,
                'quantite' => 15,
                'categorie_id' => 1,
                'sous_categorie_id' => 2,
                'marque_id' => 1,
                'description' => '<p>chaussure nike rouge</p>',
                'faux_percent' => '2',
                'vrai_percent' => NULL,
                'personnalisable' => 0,
                'uniquement_personnalisable' => 0,
                'enligne' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-08-16 12:44:08',
                'updated_at' => '2020-08-16 12:44:08',
            ),
            13 => 
            array (
                'id' => 15,
                'nom' => 'tricot',
                'images' => '["produits\\/36930acfb323574fb95d2ea4a5a32d5f.jpg"]',
                'prix_achat' => 11000,
                'prix_vente' => 12650,
                'quantite' => 7,
                'categorie_id' => 3,
                'sous_categorie_id' => 1,
                'marque_id' => 3,
                'description' => '<p>tricot femme</p>',
                'faux_percent' => NULL,
                'vrai_percent' => NULL,
                'personnalisable' => 0,
                'uniquement_personnalisable' => 0,
                'enligne' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-08-16 12:45:34',
                'updated_at' => '2020-08-16 12:45:34',
            ),
            14 => 
            array (
                'id' => 16,
                'nom' => 'veste noir',
                'images' => '["produits\\/3ab82d64b82ed42312edb659ce13663a.jpg"]',
                'prix_achat' => 100000,
                'prix_vente' => 130000,
                'quantite' => 7,
                'categorie_id' => 1,
                'sous_categorie_id' => 1,
                'marque_id' => 3,
                'description' => '<p>veste pour homme</p>

<blockquote>
<p>tres bonne qualit&eacute;</p>
</blockquote>',
                'faux_percent' => NULL,
                'vrai_percent' => NULL,
                'personnalisable' => 0,
                'uniquement_personnalisable' => 0,
                'enligne' => 1,
                'deleted_at' => NULL,
                'created_at' => '2020-08-16 12:47:41',
                'updated_at' => '2020-08-16 12:47:41',
            ),
        ));
        
        
    }
}
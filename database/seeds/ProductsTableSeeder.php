<?php

use Illuminate\Database\Seeder;
use App\Product;
class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        Product::create([
            //'categories_id' => 1,
            'fournisseur_id' =>0,
            'p_name' => 'basket bleu',
            'p_code' => 'b-bleu-123',
            'p_color' => 'bleu',
            'p_desc' => 'description basket',
            'prix' => '13000',
            'image' => 'b_bleu.jpg'
        ])->categories()->attach([
            8,10
        ]);
//2
        Product::create([
            //'categories_id' => 11,
            'fournisseur_id' =>0,
            'p_name' => 'escarpin rouge',
            'p_code' => 'esca-0011',
            'p_color' => 'rouge',
            'p_desc' => 'chaussure escarpin pour femme toutes taille',
            'prix' => '5000',
            'image' => 'escarpin-rouge.jpg'
        ])->categories()->attach([
            2,10
        ]);
            //3
        Product::create([
            //'categories_id' => 11,
            'fournisseur_id' =>0,
            'p_name' => 'iphone 11',
            'p_code' => 'esca-0011',
            'p_color' => 'bleu',
            'p_desc' => 'iphone 11',
            'prix' => '105000',
            'image' => 'iphone.jpg'
        ])->categories()->attach([
            4,17
        ]);
        //4
        Product::create([
            
            'fournisseur_id' =>0,
            'p_name' => 'montre feminine',
            'p_code' => 'femi-0011',
            'p_color' => 'blanc',
            'p_desc' => 'montre blanche simple et sympa pour femme',
            'prix' => '15000',
            'image' => 'montre-feminine.jpg'
        ])->categories()->attach([
            4,11
        ]);
        //5
        Product::create([
           
            'fournisseur_id' =>0,
            'p_name' => 'veste nike noir',
            'p_code' => 'vste-nike-0011',
            'p_color' => 'blanc-noir',
            'p_desc' => 'veste choco nike blanc noir',
            'prix' => '15000',
            'image' => 'veste-nike.jpeg'
        ])->categories()->attach([
            1,5
        ]);
        //6
        Product::create([
            'fournisseur_id' =>0,
            'p_name' => 'culotte jeans',
            'p_code' => 'cl-85011',
            'p_color' => 'bleu',
            'p_desc' => 'culotte jean pour homme femme et enfant',
            'prix' => '15000',
            'image' => 'culotte.jpg'
        ])->categories()->attach([
            1,2,3,5,6,7
        ]);
        //7
        Product::create([
            'fournisseur_id' =>0,
            'p_name' => 'veste noir homme',
            'p_code' => 'vste-85011',
            'p_color' => 'noir',
            'p_desc' => 'veste noir pour les hommes d\'affaire',
            'prix' => '18550',
            'image' => 'veste.jpg'
        ])->categories()->attach([
            1,5
        ]);
        //8
        Product::create([
            'fournisseur_id' =>0,
            'p_name' => 'T-shirt noir ',
            'p_code' => 'tsh-8711',
            'p_color' => 'noir',
            'p_desc' => 'Tshirt tout noir frai bo gosse pour enfant femme et homme',
            'prix' => '18550',
            'image' => 'tshirt-noir.png'
        ])->categories()->attach([
            1,2,3,5,6,7
        ]);
        //9
        Product::create([
            'fournisseur_id' =>0,
            'p_name' => 'montre argenter',
            'p_code' => 'mtr-1085o',
            'p_color' => 'noir',
            'p_desc' => 'montre argenter pour hommes d\'affaire',
            'prix' => '18550',
            'image' => 'montre-argenter.jpg'
        ])->categories()->attach([
            1,12
        ]);
        //10
        Product::create([
            'fournisseur_id' =>0,
            'p_name' => 'tricot pour femmme avec dentel  ',
            'p_code' => 'tgf5-11',
            'p_color' => 'jaune',
            'p_desc' => 'tricot pour femme avec dentel ',
            'prix' => '18550',
            'image' => 'tricot.jpg'
        ])->categories()->attach([
            2,6
        ]);
        //11
        Product::create([
            'fournisseur_id' =>0,
            'p_name' => 'chemise blanche femmme avec bas arrondi  ',
            'p_code' => 'chmse-arron-4515',
            'p_color' => 'jaune',
            'p_desc' => 'chemise assez souple pour femme pour les sortie, le travail et autre',
            'prix' => '1550',
            'image' => 'chemise19.jpg'
        ])->categories()->attach([
            2,6
        ]);
        //12
        Product::create([
            'fournisseur_id' =>0,
            'p_name' => 'chaussure blanche',
            'p_code' => 'ch-7854',
            'p_color' => 'blanc',
            'p_desc' => 'baket blanche pour enfant, homme et femme ',
            'prix' => '18550',
            'image' => 'chaussure-blanche.jpg'
        ])->categories()->attach([
            1,2,3,8,9,10
        ]);
        //13
        Product::create([
            'fournisseur_id' =>0,
            'p_name' => 'montre noir pour enfant',
            'p_code' => 'mtre-4515',
            'p_color' => 'noire',
            'p_desc' => 'montre noir pour enfant',
            'prix' => '15250',
            'image' => 'montre.jpg'
        ])->categories()->attach([
            3,13
        ]);
    }
}

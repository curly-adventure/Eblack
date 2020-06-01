<?php

use Illuminate\Database\Seeder;

class cate_sousTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <4 ; $i++) { 
            for ($n=1; $n <4 ; $n++) { 
        DB::table('cate_sous')->insert(array(
                'Categorie_id' => $i,
                'sousCategorie_id' => $n
           ));
    }
    }}
}

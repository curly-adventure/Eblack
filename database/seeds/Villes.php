<?php

use Illuminate\Database\Seeder;
use App\Models\Villes;
class VillesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Villes::create([
            "nom"=>"Abidjan",
        ]);
        Villes::create([
            "nom"=>"Bouake",
        ]);
        Villes::create([
            "nom"=>"Yamoussoukro",
        ]);
        Villes::create([
            "nom"=>"Daloa",
        ]);
        Villes::create([
            "nom"=>"Man",
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Models\Communes;
class CommunesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Communes::create([
            "nom"=>"yopougon",
            "ville_id"=> 1,
        ]);
        Communes::create([
            "nom"=>"cocody",
            "ville_id"=> 1,
        ]);
        Communes::create([
            "nom"=>"koumassi",
            "ville_id"=> 1,
        ]);
        Communes::create([
            "nom"=>"Adjamé",
            "ville_id"=> 1,
        ]);
        Communes::create([
            "nom"=>"bouake",
            "ville_id"=> 2,
        ]);
        Communes::create([
            "nom"=>"yakro",
            "ville_id"=> 3,
        ]);
        Communes::create([
            "nom"=>"daloua",
            "ville_id"=> 4,
        ]);
        Communes::create([
            "nom"=>"man",
            "ville_id"=> 5,
        ]);
        Communes::create([
            "nom"=>"marcory",
            "ville_id"=> 1,
        ]);
        Communes::create([
            "nom"=>"abobo",
            "ville_id"=> 1,
        ]);
    }
}

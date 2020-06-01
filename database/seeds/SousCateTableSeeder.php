<?php

use Illuminate\Database\Seeder;
use App\Models\Souscategorie;
class SousCateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Souscategorie::create([
            'nom' => 'Vêtement',
            'logo' => '10.jpg',
        ]);
        Souscategorie::create([
            'nom' => 'Chaussure',
            'logo' => '16.jpg',
        ]);
        Souscategorie::create([
            'nom' => 'Accessoire',
            'logo' => '7.jpg',
        ]);
    }
}

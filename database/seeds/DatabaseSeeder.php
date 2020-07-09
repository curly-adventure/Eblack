<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {    
        
        $this->call(CategorieTableSeeder::class);
        $this->call(SousCategorieTableSeeder::class);
        $this->call(CategoryHasSouscategorieSeeder::class);
        $this->call(MarqueTableSeeder::class);
        $this->call(VillesTableSeeder::class);
        $this->call(CommunesTableSeeder::class);
        
       
        $this->call(ProduitsTableSeeder::class);
        $this->call(AdministratorsTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(AdressesTableSeeder::class);
        $this->call(WishlistTableSeeder::class);
        $this->call(StatusCommandesTableSeeder::class);
       
        
        $this->call(AchatProduitsTableSeeder::class);
        $this->call(AchatsTableSeeder::class);
    }
}
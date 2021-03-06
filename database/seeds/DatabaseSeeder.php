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
        $this->call(AdressesTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(WishlistTableSeeder::class);
        $this->call(StatusCommandesTableSeeder::class);
        $this->call(AchatsTableSeeder::class);
        
        $this->call(AchatProduitsTableSeeder::class);
        
        $this->call(BonReductionTableSeeder::class);
        $this->call(TarifLivraisonsTableSeeder::class);
        $this->call(SlidersTableSeeder::class);
        
        $this->call(MargeTableSeeder::class);
        $this->call(PromotionTableSeeder::class);
        $this->call(CommandeTableSeeder::class);
        $this->call(RatingsTableSeeder::class);
    }
}
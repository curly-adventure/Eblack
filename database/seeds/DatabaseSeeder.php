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
        $this->call(VillesTableSeeder::class);
        $this->call(CommunesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(SousCateTableSeeder::class);
        $this->call(CategoryHasSouscategorieSeeder::class);
        //$this->call(UsersTableSeeder::class);
    }
}
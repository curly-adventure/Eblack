<?php
use Illuminate\Support\Facades\DB;
use App\Categories;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        Categories::create([
            'id' => 1,
            'nom' => 'Mode Homme',
        ]);
        
    }
}

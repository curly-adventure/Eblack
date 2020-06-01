<?php
use Illuminate\Support\Facades\DB;
use App\Models\Category;
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
        Category::create([
            'nom' => 'Mode Homme',
            'logo' => '17.jpeg',
        ]);
        Category::create([
            'nom' => 'Mode Enfant',
            'logo' => '12.png',
        ]);
        Category::create([
            'nom' => 'Mode Femme',
            'logo' => '14.jpg',
        ]);
        
    }
}

<?php
use Illuminate\Support\Facades\DB;
use App\Category;
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
            'parent_id' => 0,
            'name' => 'Mode Homme',
            'description' => 'Tous les vêtements et accessoires pour hommes',
        ]);
        
        //2
        Category::create([
            'parent_id' => 0,
            'name' => 'Mode Femme',
            'description' => 'Tous les vêtements et accessoires pour femmes',
        ]);
            //3
        Category::create([
            'parent_id' => 0,
            'name' => 'Mode Enfant',
            'description' => 'Tous les vêtements et accessoires pour enfants',
          
        ]);

        //4
        Category::create([
            'parent_id' => 0,
            'name' => 'Electronique',
            'description' => 'Tous les gadgets informatiques, mobiles et autres gadgets électroniques',
           
        ]);

      //5
        Category::create([
            'parent_id' => 1,
            'name' => ' vetement',
            'description' => 'vetement pour hommes',
            
        ]);

        //6
        Category::create([
            'parent_id' => 2,
            'name' => ' vetement',
            'description' => 'vetement pour femmes',
            
        ]);
        //7
        Category::create([
            'parent_id' => 3,
            'name' => ' vetement',
            'description' => 'T-shirt pour enfant',
            
        ]);

        //8
        Category::create([
            'parent_id' => 1,
            'name' => 'chaussures',
            'description' => 'Toutes les chaussures pour hommes',
            
        ]);
         //9
        Category::create([
            'parent_id' => 3,
            'name' => 'chaussures',
            'description' => 'Tous les chaussures pour enfants',
            
        ]);
         //10
        Category::create([
            'parent_id' => 2,
            'name' => 'chaussures',
            'description' => 'Tous les chaussures pour femmes',
            
        ]);
            //11
        Category::create([
            'parent_id' => 2,
            'name' => 'accessoires',
            'description' => 'accessoire de femmes',
          
        ]);
        
        //12
        Category::create([
            'parent_id' => 1,
            'name' => 'accessoires',
            'description' => 'accessoire d\'hommes',
          
        ]);
    
        //13
        Category::create([
            'parent_id' => 3,
            'name' => 'accessoires',
            'description' => 'accessoire pour enfants',
          
        ]);
        //14
        Category::create([
            'parent_id' => 4,
            'name' => 'accessoires',
            'description' => 'accessoire electroniques',
          
        ]);

        //15
        Category::create([
            'name' => 'audios',
            'parent_id' => 4,
            'description' => 'casque audio et autres',
        ]);

        //16
        Category::create([
            'name' => 'tel & pc',
            'parent_id' => 4,
            'description' => 'accessoire de telefonne et pc',
            
        ]);
       
    }
}

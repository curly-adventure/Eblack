<?php

use Illuminate\Database\Seeder;

class CommandeTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('commande')->delete();
        
        
        
    }
}
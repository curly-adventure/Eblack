<?php

use Illuminate\Database\Seeder;

class BonReductionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('bon_reduction')->delete();
        
        \DB::table('bon_reduction')->insert(array (
            0 => 
            array (
                'id' => 1,
                'code' => 'eblack-cp$01',
                'valeur' => 50,
                'utilise' => 0,
                'deleted_at' => NULL,
                'created_at' => '2020-07-16 01:39:59',
                'updated_at' => '2020-07-16 03:54:22',
            ),
        ));
        
        
    }
}
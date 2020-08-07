<?php

use Illuminate\Database\Seeder;

class MargeTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('marge')->delete();
        
        \DB::table('marge')->insert(array (
            0 => 
            array (
                'id' => 1,
                'max' => 4999,
                'marge' => 5,
                'created_at' => '2020-08-04 22:22:10',
                'updated_at' => '2020-08-04 22:22:10',
            ),
            1 => 
            array (
                'id' => 2,
                'max' => 10000,
                'marge' => 10,
                'created_at' => '2020-08-04 22:22:56',
                'updated_at' => '2020-08-04 22:22:56',
            ),
            2 => 
            array (
                'id' => 3,
                'max' => 25000,
                'marge' => 15,
                'created_at' => '2020-08-04 22:23:22',
                'updated_at' => '2020-08-04 22:23:22',
            ),
            3 => 
            array (
                'id' => 4,
                'max' => 50000,
                'marge' => 20,
                'created_at' => '2020-08-04 22:24:07',
                'updated_at' => '2020-08-04 22:24:07',
            ),
            4 => 
            array (
                'id' => 5,
                'max' => 10000,
                'marge' => 25,
                'created_at' => '2020-08-04 22:24:23',
                'updated_at' => '2020-08-04 22:24:23',
            ),
            5 => 
            array (
                'id' => 6,
                'max' => 1000000000,
                'marge' => 30,
                'created_at' => '2020-08-04 22:25:06',
                'updated_at' => '2020-08-04 22:25:06',
            ),
        ));
        
        
    }
}
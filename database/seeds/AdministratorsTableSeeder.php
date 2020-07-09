<?php

use Illuminate\Database\Seeder;

class AdministratorsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('administrators')->delete();
        
        \DB::table('administrators')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'email' => 'admin@eblack.ci',
                'email_verified_at' => NULL,
                'password' => '$2y$10$DJQxPVhPPg6JcHEla226vev7nVXs3gSimRKehtZTjr4ObZKECPFg2',
                'remember_token' => NULL,
                'created_at' => '2020-07-06 19:27:58',
                'updated_at' => '2020-07-06 19:27:58',
            ),
        ));
        
        
    }
}
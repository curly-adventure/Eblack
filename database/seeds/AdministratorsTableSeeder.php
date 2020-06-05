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
        

        \DB::table('Administrators')->delete();
        
        \DB::table('Administrators')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'email' => 'admin@eblack.ci',
                'email_verified_at' => NULL,
                'password' => '$2y$10$SHPzHVV7P1xsmGoH33YbkOPtCYxR9B5RAD921dzziKafO8e5RrURy',
                'remember_token' => NULL,
                'created_at' => '2020-06-05 20:48:08',
                'updated_at' => '2020-06-05 20:48:08',
            ),
        ));
        
        
    }
}
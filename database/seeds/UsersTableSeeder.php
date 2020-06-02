<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$uSRZyHHRqZmrSIkI4wn7Vedfdja6HX7XmZFQ8aTqMjAcxv9ehtt/q',
                'remember_token' => NULL,
                'created_at' => '2020-06-02 18:13:18',
                'updated_at' => '2020-06-02 18:13:18',
            ),
        ));
        
        
    }
}
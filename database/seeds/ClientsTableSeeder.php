<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('clients')->delete();
        
        \DB::table('clients')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nom' => 'sminth',
                'prenom' => 'emmanuel lolipop',
                'email' => 'virtus225one@gmail.com',
                'numero' => '88364403',
                'motdepasse' => '$2y$10$qXZv01Etb4zCt1MOAns1f.CMbwXRi4fI1vWMNZeNglKB4cPdW7JW2',
                'provider' => NULL,
                'provider_id' => NULL,
                'Adresse_id' => 3,
                'remember_token' => NULL,
                'last_seen' => '2020-08-07 18:57:24',
                'deleted_at' => NULL,
                'created_at' => '2020-07-06 19:05:24',
                'updated_at' => '2020-08-07 18:57:24',
            ),
            1 => 
            array (
                'id' => 2,
                'nom' => 'eblack',
                'prenom' => 'admin',
                'email' => 'admin@eblack.ci',
                'numero' => '88364403',
                'motdepasse' => '$2y$10$vzDrKJh67UcgASCj6eH63ufJ.0WDiyHDvRe3XlAY0.6p2HGhuMDOG',
                'provider' => NULL,
                'provider_id' => NULL,
                'Adresse_id' => NULL,
                'remember_token' => 'FdHuRrhK3u80eOZlie7dI8uxrZNsm8AIC7RtSkwPSF1B38cCOJkXO9DMPvDh',
                'last_seen' => '2020-08-09 23:32:07',
                'deleted_at' => NULL,
                'created_at' => '2020-07-06 19:07:29',
                'updated_at' => '2020-08-09 23:32:07',
            ),
            2 => 
            array (
                'id' => 3,
                'nom' => 'koffi',
                'prenom' => 'koumou steve job anderson',
                'email' => 'expertproffessionnel@gmail.com',
                'numero' => '88364403',
                'motdepasse' => '$2y$10$X2YLeHySs3fXakcTaEfZNuJt/iL6TmSBy2BpBX4Y/ZDpIxsvokg5K',
                'provider' => NULL,
                'provider_id' => NULL,
                'Adresse_id' => NULL,
                'remember_token' => '9BNL3DI2a8ExYayQ8lREiZUpgfiQNFlFOGmkTFXhyRfXgxVhEsxb5ty8CiZF',
                'last_seen' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-07-16 18:31:04',
                'updated_at' => '2020-07-20 11:57:59',
            ),
            3 => 
            array (
                'id' => 4,
                'nom' => 'Tano',
                'prenom' => 'junior',
                'email' => 'juniortano035@gmail.com',
                'numero' => '67651682',
                'motdepasse' => '$2y$10$k78WR6qPRnrgyQxEn707BeToIXvr58y1YXCvVE8eHgVzU1x26tggy',
                'provider' => NULL,
                'provider_id' => NULL,
                'Adresse_id' => NULL,
                'remember_token' => NULL,
                'last_seen' => '2020-08-10 09:43:01',
                'deleted_at' => NULL,
                'created_at' => '2020-08-10 08:57:32',
                'updated_at' => '2020-08-10 09:43:01',
            ),
        ));
        
        
    }
}
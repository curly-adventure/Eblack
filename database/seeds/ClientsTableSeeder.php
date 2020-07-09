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
                'Adresse_id' => NULL,
                'remember_token' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-07-06 19:05:24',
                'updated_at' => '2020-07-06 19:05:24',
            ),
            1 => 
            array (
                'id' => 2,
                'nom' => 'eblack',
                'prenom' => 'admin',
                'email' => 'admin@eblack.ci',
                'numero' => NULL,
                'motdepasse' => '$2y$10$D3NJtumH2Br9D8CF2TL/pugO0wDBpO2p/FZ3fQm24tpjZ4wvQS59e',
                'provider' => NULL,
                'provider_id' => NULL,
                'Adresse_id' => NULL,
                'remember_token' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-07-06 19:07:29',
                'updated_at' => '2020-07-06 19:07:29',
            ),
        ));
        
        
    }
}
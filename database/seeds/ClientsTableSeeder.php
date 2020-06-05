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
        

        \DB::table('Clients')->delete();
        
        \DB::table('Clients')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nom' => 'sminth',
                'prenom' => 'emmanuel',
                'email' => 'virtus225one@gmail.com',
                'motdepasse' => 'malan225',
                'Adresse_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-06-05 21:24:25',
                'updated_at' => '2020-06-05 21:24:25',
            ),
            1 => 
            array (
                'id' => 3,
                'nom' => 'lolipop',
                'prenom' => 'notofi',
                'email' => 'virtus225@gmail.com',
                'motdepasse' => 'MHYjPzfysAeNm8N',
                'Adresse_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-06-05 21:28:10',
                'updated_at' => '2020-06-05 21:28:10',
            ),
            2 => 
            array (
                'id' => 4,
                'nom' => 'Kouame',
                'prenom' => 'denzel',
                'email' => 'denzel@gmail.com',
                'motdepasse' => 'denzel225',
                'Adresse_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-06-05 21:29:04',
                'updated_at' => '2020-06-05 21:30:42',
            ),
            3 => 
            array (
                'id' => 5,
                'nom' => 'gomolo',
                'prenom' => 'guy stephane',
                'email' => 'lolo@gmail.com',
                'motdepasse' => 'MHYjPzfysAeNm8N',
                'Adresse_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-06-05 21:31:27',
                'updated_at' => '2020-06-05 21:31:27',
            ),
        ));
        
        
    }
}
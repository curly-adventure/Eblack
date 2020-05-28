<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUtilisateursTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Utilisateurs';

    /**
     * Run the migrations.
     * @table Utilisateurs
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('nom', 45)->nullable();
            $table->string('prenom', 45)->nullable();
            $table->string('email', 45)->nullable();
            $table->string('motdepasse', 45)->nullable();
            $table->integer('Adresse_id')->unsigned();

            $table->index(["Adresse_id"], 'fk_Utilisateurs_Adresse1_idx');
            $table->nullableTimestamps();


            $table->foreign('Adresse_id', 'fk_Utilisateurs_Adresse1_idx')
                ->references('id')->on('Adresse')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}

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
            $table->bigIncrements('id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('email', 45)->unique();
            $table->string('motdepasse', 45);
            $table->bigInteger('Adresse_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('Adresse_id')
                ->references('id')->on('Adresses')
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

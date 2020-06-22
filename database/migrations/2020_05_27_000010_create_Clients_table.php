<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Clients';

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
            $table->string('email', 45)->nullable()->unique();
            $table->string('motdepasse', 250);
            $table->bigInteger('Adresse_id')->nullable()->unsigned();
            $table->rememberToken();
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

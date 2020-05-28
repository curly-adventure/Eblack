<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdresseTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Adresse';

    /**
     * Run the migrations.
     * @table Adresse
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('description', 45)->nullable();
            $table->integer('Communes_id')->unsigned();

            $table->index(["Communes_id"], 'fk_Adresse_Communes1_idx');


            $table->foreign('Communes_id', 'fk_Adresse_Communes1_idx')
                ->references('id')->on('Communes')
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

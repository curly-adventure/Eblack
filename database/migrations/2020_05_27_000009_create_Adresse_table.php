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
    public $tableName = 'Adresses';

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
            $table->bigIncrements('id');
            $table->bigInteger('utilisateur_id')->unsigned();
            $table->bigInteger('Communes_id')->unsigned();
            $table->longText('description');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('Communes_id')
                ->references('id')->on('Communes');
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

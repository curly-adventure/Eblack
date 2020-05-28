<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBonReductionTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'bon_reduction';

    /**
     * Run the migrations.
     * @table bon_reduction
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('code', 45)->nullable();
            $table->integer('valeur')->nullable();
            $table->tinyInteger('utilise')->nullable();
            $table->integer('Administrateurs_id')->unsigned();

           


            $table->foreign('Administrateurs_id', 'fk_bon_reduction_Administrateurs1_idx')
                ->references('id')->on('Administrateurs')
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

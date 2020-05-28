<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageProduitTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'image_produit';

    /**
     * Run the migrations.
     * @table image_produit
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('lien', 45)->nullable();
            $table->integer('Produits_id')->unsigned();

            $table->index(["Produits_id"], 'fk_image_produit_Produits1_idx');


            $table->foreign('Produits_id', 'fk_image_produit_Produits1_idx')
                ->references('id')->on('Produits')
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

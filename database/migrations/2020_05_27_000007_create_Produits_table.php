<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduitsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Produits';

    /**
     * Run the migrations.
     * @table Produits
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('nom', 45)->nullable();
            $table->string('prix_achat', 45)->nullable();
            $table->string('prix_vente', 45)->nullable();
            $table->string('enligne', 45)->nullable();
            $table->string('quantite', 45)->nullable();
            $table->integer('Categorie_id')->unsigned();
            $table->integer('sousCategorie_id')->unsigned();
            $table->integer('Marque_id')->unsigned();
            $table->longText('description')->nullable();
            $table->timestamps();
            $table->index(["Categorie_id"], 'fk_Produits_Categorie1_idx');

            $table->index(["Marque_id"], 'fk_Produits_Marque1_idx');

            $table->index(["sousCategorie_id"], 'fk_Produits_sousCategorie1_idx');


            $table->foreign('Categorie_id', 'fk_Produits_Categorie1_idx')
                ->references('id')->on('Categorie')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('sousCategorie_id', 'fk_Produits_sousCategorie1_idx')
                ->references('id')->on('sousCategorie')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Marque_id', 'fk_Produits_Marque1_idx')
                ->references('id')->on('Marque')
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

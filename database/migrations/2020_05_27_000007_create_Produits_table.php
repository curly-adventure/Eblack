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
            $table->bigIncrements('id')->unsigned();
            $table->string('nom')->unique();
            $table->longText('images');
            $table->integer('prix_achat');
            $table->integer('prix_vente');
            $table->integer('quantite')->default(1);
            $table->bigInteger('categorie_id')->unsigned();
            $table->bigInteger('sous_categorie_id')->unsigned();
            $table->bigInteger('marque_id')->unsigned();
            $table->longText('description');
            $table->string('faux_percent')->nullable();
            $table->string('vrai_percent')->nullable();
            $table->boolean('personnalisable')->default(false);
            $table->boolean('uniquement_personnalisable')->default(false);
            $table->boolean('enligne')->default(true);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('categorie_id')
                ->references('id')->on('Categorie')->onDelete('cascade');

            $table->foreign('sous_categorie_id')
                ->references('id')->on('sousCategorie')->onDelete('cascade');

            $table->foreign('marque_id')
                ->references('id')->on('Marque')->onDelete('cascade');
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

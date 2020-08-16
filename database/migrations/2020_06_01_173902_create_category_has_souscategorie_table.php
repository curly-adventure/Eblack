<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryHasSouscategorieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_has_souscategorie', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('Categorie_id')->unsigned();
            $table->bigInteger('sousCategorie_id')->unsigned();
            $table->timestamps();

            $table->foreign('Categorie_id')
                ->references('id')->on('Categorie')->onDelete('cascade');

            $table->foreign('sousCategorie_id')
                ->references('id')->on('sousCategorie')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_has_souscategorie');
    }
}

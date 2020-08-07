<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->bigInteger('categorie_id')->nullable();
            $table->bigInteger('sous_categorie_id')->nullable();
            $table->bigInteger('produit_id')->nullable();
            $table->string('titre');
            $table->longText('image');
            $table->softDeletes();
            $table->timestamps();

           /* $table->foreign('categorie_id')
                ->references('id')->on('Categorie');

            $table->foreign('sous_categorie_id')
                ->references('id')->on('sousCategorie');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sliders');
    }
}

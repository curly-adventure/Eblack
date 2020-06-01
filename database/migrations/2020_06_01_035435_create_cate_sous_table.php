<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCateSousTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cate_sous', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('Categorie_id')->unsigned();
            $table->bigInteger('sousCategorie_id')->unsigned();
            $table->timestamps();

            $table->foreign('Categorie_id')
                ->references('id')->on('Categorie');

            $table->foreign('sousCategorie_id')
                ->references('id')->on('sousCategorie');

        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cate_sous');
    }
}

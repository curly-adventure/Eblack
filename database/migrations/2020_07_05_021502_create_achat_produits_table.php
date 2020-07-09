<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAchatProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achat_produits', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('achat_id')->unsigned();
            $table->bigInteger('produit_id')->unsigned();
            $table->string('nom');
            $table->integer('prix');
            $table->integer('quantite')->default(1);
            $table->timestamps();

            $table->foreign('achat_id')
                ->references('id')->on('Achats');
            $table->foreign('produit_id')
                ->references('id')->on('Produits');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('achat_produits');
    }
}

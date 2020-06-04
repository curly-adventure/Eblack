<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAchatsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Achats';

    /**
     * Run the migrations.
     * @table Achats
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id')->unsigned();
            $table->integer('prix_vente');
            $table->integer('prix_achat');
            $table->bigInteger('produit_id')->unsigned();
            $table->bigInteger('adresse_id')->unsigned();
            $table->bigInteger('client_id')->unsigned();
            $table->boolean('canceled')->default(false)
                ->comment('pour voir si la commande est annulée');
            $table->softDeletes();
            $table->timestamps();


            $table->foreign('produit_id')
                ->references('id')->on('Produits');

            $table->foreign('adresse_id')
                ->references('id')->on('Adresses');

            $table->foreign('client_id')
                ->references('id')->on('Clients');
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

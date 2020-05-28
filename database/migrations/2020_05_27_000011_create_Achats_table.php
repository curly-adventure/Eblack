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
            $table->increments('id')->unsigned();
            $table->string('prix_vente', 45)->nullable();
            $table->string('prix_achat', 45)->nullable();
            $table->integer('Produits_id')->unsigned();
            $table->integer('Adresse_id')->unsigned();
            $table->integer('Utilisateurs_id')->unsigned();
            $table->tinyInteger('livre')->nullable();

            $table->index(["Adresse_id"], 'fk_Achats_Adresse1_idx');

            $table->index(["Utilisateurs_id"], 'fk_Achats_Utilisateurs1_idx');

            $table->index(["Produits_id"], 'fk_Achats_Produits1_idx');


            $table->foreign('Produits_id', 'fk_Achats_Produits1_idx')
                ->references('id')->on('Produits')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Adresse_id', 'fk_Achats_Adresse1_idx')
                ->references('id')->on('Adresse')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Utilisateurs_id', 'fk_Achats_Utilisateurs1_idx')
                ->references('id')->on('Utilisateurs')
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

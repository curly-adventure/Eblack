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
            $table->integer('num_achat');
            $table->integer('montant');
            $table->integer('soustotal')->nullable();
            $table->integer('quantite');
            $table->bigInteger('client_id')->unsigned();
            $table->bigInteger('adresse_id')->unsigned();
            $table->string('methode_paiement');
            $table->integer('status_id')->default(1);
            $table->boolean('canceled')->default(false)
                ->comment('pour voir si la commande est annulée');
            $table->softDeletes();
            $table->timestamps();

            
            $table->foreign('adresse_id')
                ->references('id')->on('Adresses')->onDelete('cascade');
            $table->foreign('client_id')
                ->references('id')->on('Clients')->onDelete('cascade');
            //$table->foreign('status_id')
               // ->references('id')->on('status_commandes');
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

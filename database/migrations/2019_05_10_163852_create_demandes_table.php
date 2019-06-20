<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDemandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demandes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('numOrdre');
            $table->string('objet');
            $table->string('description');
            $table->date('dateVisite');
            $table->double('heurEntree');
            $table->double('heurSortie');
            $table->integer('nbrVisiteur');
            $table->integer('theme_id');
            $table->string('infoDivision');
            $table->string('actionDivision');
            $table->string('respDossier');
            $table->integer('statu_id');
            $table->integer('type_id');
            $table->integer('division_id');
            $table->integer('service_id');
            $table->integer('commune_id');
            $table->integer('sExt_id');
            $table->date('dateEnreg');
            $table->date('dateMaj');
            $table->string('remarque');
            $table->string('serviceSuppl');
            $table->integer('commandement_id');
            $table->integer('visiteur_id');
            $table->date('dateLimite');
            $table->date('dateEvenement');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('demandes');
    }
}

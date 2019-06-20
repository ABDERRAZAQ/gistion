<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisiteursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visiteurs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('numCIN');
            $table->string('nomAr');
            $table->string('prenomAr');
            $table->string('nomFR');
            $table->string('prenomFR');
            $table->integer('telephone');
            $table->string('email');
            $table->string('adresse');
            $table->date('dateNaissance');
            $table->integer('sexe_id');
            $table->integer('commune_id');
            $table->integer('demande_id');
            $table->integer('classe_id');
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
        Schema::dropIfExists('visiteurs');
    }
}

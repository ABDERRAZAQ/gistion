<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommuneLocalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commune_locals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('commandement_id');
            $table->string('nomCommuneAr');
            $table->string('nomCommuneFr');
            $table->string('natureCommune');
            $table->integer('codeCommune');
            $table->integer('nouveauCodeCommune');
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
        Schema::dropIfExists('commune_locals');
    }
}

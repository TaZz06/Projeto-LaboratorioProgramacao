<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidato extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidato', function (Blueprint $table) {
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('ProfissionalArea');
            $table->string('Schooling');
            $table->string('ProfessionalExperience');
            $table->string('Skills');
            $table->string('ApplicationHistory');
            $table->foreign('ApplicationHistory')->references('id')->on('anuncio');
            $table->string('FavoriteAds');
            $table->foreign('FavoriteAds')->references('id')->on('anuncio');
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
        Schema::dropIfExists('candidato');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnuncio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anuncio', function (Blueprint $table) {
            $table->id();
            $table->string('Workspace');
            $table->string('JobDescription');
            $table->string('DesiredSkills');
            $table->string('Conditions');
            $table->integer('Candidates');
            $table->foreign('Candidates')->references('id')->on('users');
            $table->string('Type');
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
        Schema::dropIfExists('anuncio');
    }
}

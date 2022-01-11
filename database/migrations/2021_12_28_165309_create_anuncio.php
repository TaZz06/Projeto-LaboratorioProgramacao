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
        Schema::create('anuncios', function (Blueprint $table) {
            $table->id()->onDelete('cascade');
            $table->unsignedBigInteger('empresa_id');
            $table->string('workspace');
            $table->string('job_description');
            $table->string('desired_skills');
            $table->float('salary');
            $table->string('type'); 
            $table->string('city');
            $table->timestamps();
            $table->foreign('empresa_id')->references('id')->on('empresas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anuncios');
    }
}

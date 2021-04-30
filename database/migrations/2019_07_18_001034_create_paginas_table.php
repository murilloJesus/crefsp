<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaginasTable extends Migration
{

    public function up()
    {
        Schema::create('paginas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('referencia_id')->nullable();
            $table->integer('search_id')->nullable();
            $table->integer('tema_id')->nullable();
            $table->integer('galeria_id')->nullable();
            $table->integer('indice')->nullable();
            $table->string('name', 255)->nullable();
            $table->string('source', 255)->nullable();
            $table->text('template')->nullable();
            $table->boolean('status')->nullable();
            $table->nestedSet();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('paginas');
    }
}

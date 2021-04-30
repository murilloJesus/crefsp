<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissoes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 80)->nullable();

            $table->boolean('home')->nullable();
            $table->boolean('paginas')->nullable();

            $table->boolean('noticias')->nullable();
            $table->boolean('eventos')->nullable();
            $table->boolean('licitacoes')->nullable();
            $table->boolean('emprego')->nullable();
            $table->boolean('multimidia')->nullable();
            $table->boolean('clube')->nullable();
            $table->boolean('unidades')->nullable();

            $table->boolean('pessoas')->nullable();
            $table->boolean('formularios')->nullable();

            $table->boolean('usuarios')->nullable();
    
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
        Schema::dropIfExists('permissoes');
    }
}

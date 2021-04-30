<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSearchesTable extends Migration
{
    public function up()
    {
        Schema::create('searches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('pesquisar')->nullable()->default(false);
            $table->boolean('categoria')->nullable()->default(false);
            $table->boolean('datarange')->nullable()->default(false);
            $table->boolean('datamm')->nullable()->default(false);
            $table->boolean('datayy')->nullable()->default(false);
            $table->boolean('cidade')->nullable()->default(false);
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
        Schema::dropIfExists('searches');
    }
}

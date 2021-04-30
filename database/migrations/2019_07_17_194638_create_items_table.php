<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('pagina_id')->nullable();
            $table->integer('item_id')->nullable();
            $table->integer('referencia_id')->nullable();
            $table->integer('arquivo_id')->nullable();
            $table->integer('image_id')->nullable();
            $table->integer('galeria_id')->nullable();
            $table->boolean('status')->nullable()->default(true);
            $table->string('type', 80)->nullable();
            $table->string('icone', 80)->nullable();
            $table->string('arquive', 80)->nullable();
            $table->string('name', 255)->nullable();
            $table->text('source')->nullable();
            $table->text('href')->nullable();
            $table->string('imagem', 255)->nullable();
            $table->string('categoria', 80)->nullable();
            $table->string('cidade', 80)->nullable();
            $table->string('datamm', 80)->nullable();
            $table->string('datayy', 80)->nullable();
            $table->string('data', 80)->nullable();
            $table->integer('flash')->nullable();
            $table->integer('video')->nullable();
            $table->integer('zip')->nullable();
            $table->integer('pdf')->nullable();
            $table->text('descricao')->nullable();
            $table->text('template')->nullable();
            $table->text('objeto')->nullable();
            $table->string('atividade', 80)->nullable();
            $table->string('autor', 80)->nullable();
            $table->text('endereco')->nullable();
            $table->string('local', 80)->nullable();
            $table->text('site')->nullable();
            $table->string('telefone', 80)->nullable();
            $table->string('cargo', 80)->nullable();
            $table->string('doc', 80)->nullable();
            $table->string('credencial', 80)->nullable();
            $table->string('formato', 80)->nullable();
            $table->string('numero', 80)->nullable();
            $table->string('processo', 80)->nullable();
            $table->string('latitude', 80)->nullable();
            $table->string('longitude', 80)->nullable();
            $table->boolean('destaque')->nullable()->default(false);
            $table->boolean('obrigatorio')->nullable()->default(false);
            $table->integer('ticket_publico')->nullable();
            $table->integer('ticket_estudante')->nullable();
            $table->integer('ticket_credenciado')->nullable();
            $table->integer('destaque_pequeno')->nullable();
            $table->integer('destaque_medio')->nullable();
            $table->integer('destaque_grande')->nullable();
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
        Schema::dropIfExists('items');
    }
}

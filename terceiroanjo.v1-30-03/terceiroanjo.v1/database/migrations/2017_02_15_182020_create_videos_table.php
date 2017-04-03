<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_palestrante')->unsigned();
            $table->foreign('id_palestrante')->references('id')->on('palestrantes');
            $table->string('nome');
            $table->text('descricao');
            $table->string('imagem');
            $table->text('link_video');
            $table->timestamps();
        });

        Schema::create('categoria_video', function (Blueprint $table) {
            $table->integer('categoria_id')->unsigned();
            $table->integer('video_id')->unsigned();

            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
            $table->foreign('video_id')->references('id')->on('videos')->onDelete('cascade');

            $table->primary(['categoria_id','video_id']);
        });

        Schema::create('subcategoria_video', function (Blueprint $table) {
            $table->integer('subcategoria_id')->unsigned();
            $table->integer('video_id')->unsigned();

            $table->foreign('subcategoria_id')->references('id')->on('subcategorias')->onDelete('cascade');
            $table->foreign('video_id')->references('id')->on('videos')->onDelete('cascade');

            $table->primary(['subcategoria_id','video_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}

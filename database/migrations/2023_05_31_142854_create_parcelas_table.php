<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParcelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcelas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('cultivo');
            $table->integer('num_uni_total');
            $table->integer('num_uni_falta');
            $table->string('imagen');
            $table->integer('provincia_id');
            $table->integer('municipio_id');
            $table->integer('agregado');
            $table->integer('zona');
            $table->integer('poligono');
            $table->integer('parcela');
            $table->double('superficie_total');
            $table->double('superficie_uso');
            $table->integer('recinto');
            $table->double('pendiente');
            $table->string('referencia_catastral');
            $table->string('url_sigpac');
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
        Schema::dropIfExists('parcelas');
    }
}

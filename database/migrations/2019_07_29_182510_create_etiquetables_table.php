<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEtiquetablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('etiquetables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('etiqueta_id')->unsigned();
            $table->integer('etiquetable_id')->unsigned();
            $table->string('etiquetable_type'); // el nombre del modelo
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
        Schema::dropIfExists('etiquetables');
    }
}

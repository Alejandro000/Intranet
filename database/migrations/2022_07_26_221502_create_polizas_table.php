<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePolizasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polizas', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('ingeniero_id')->nullable();            
            $table->foreign('ingeniero_id')
            // $table
                ->references('id')
                ->on('ingenieros')
                ->onDelete('set null')
                ->onUpdate('cascade');
            // $table->string('ingeniero_id')->nullable();            
            // $table->foreign('ingeniero_id')
            // // $table
            //     ->references('id')
            //     ->on('ingenieros')
            //     // ->nullOnDelete();
            //     ->onDelete('set null')
            //     ->onUpdate('cascade');

            $table->unsignedBigInteger('tipospoliza_id')->nullable();
            $table->foreign('tipospoliza_id')
                ->references('id')
                ->on('tipospolizas')
                ->onDelete('set null')
                ->onUpdate('cascade');

            $table->string('folio', 45);
            $table->string('cliente', 70);

            $table->unsignedBigInteger('paise_id')->nullable();
            $table->foreign('paise_id')
                ->references('id')
                ->on('paises')
                ->onDelete('set null')
                ->onUpdate('cascade');
                
            $table->string('ciudad', 45);

            $table->unsignedBigInteger('ejecutivo_id')->nullable();
            $table->foreign('ejecutivo_id')
                    ->references('id')
                    ->on('ejecutivos')
                    ->onDelete('set null')
                    ->onUpdate('cascade');

            $table->unsignedBigInteger('marca_id')->nullable();
            $table->foreign('marca_id')
                ->references('id')
                ->on('marcas')
                ->onDelete('set null')
                ->onUpdate('cascade');

            $table->string('modelo', 45);
            $table->string('numeroSerie', 45);
            $table->text('comentarios')->nullable();
            $table->string('pdf');
            $table->dateTime('fechaInicio');
            $table->dateTime('fechaFin');

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
        Schema::dropIfExists('polizas');
    }
}

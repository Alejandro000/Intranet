<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('ejecutivo_id')->nullable();
            $table->foreign('ejecutivo_id')
                    ->references('id')
                    ->on('ejecutivos')
                    ->onDelete('set null')
                    ->onUpdate('cascade');

            $table->string('integrador', 50);
            $table->string('clienteFinal', 50);

            $table->unsignedBigInteger('marca_id')->nullable();
            $table->foreign('marca_id')
                ->references('id')
                ->on('marcas')
                ->onDelete('set null')
                ->onUpdate('cascade');

            $table->string('productos', 150);
            $table->decimal('subtotal', 9,2);

            $table->unsignedBigInteger('estado_id')->nullable();
            $table->foreign('estado_id')
                  ->references('id')
                  ->on('estados')
                  ->onDelete('set null')
                  ->onUpdate('cascade');
            
            $table->dateTime('fechaCierre');
            $table->string('comentarios', 300)->nullable();
            
            $table->unsignedBigInteger('ingpreventa_id')->nullable();
            $table->foreign('ingpreventa_id')
                  ->references('id')
                  ->on('ingpreventas')
                  ->onDelete('set null')
                  ->onUpdate('cascade');

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
        Schema::dropIfExists('proyectos');
    }
};

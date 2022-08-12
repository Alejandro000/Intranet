<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngenierosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingenieros', function (Blueprint $table) {
            $table->id();
            // $table->string('id', 70)->primary();
            $table->string('ingeniero', 70)->unique();
            // $table->string('ingeniero', 70);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingenieros');
    }
}

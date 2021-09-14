<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePdgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pdgs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nompdg');
            $table->string('prenompdg');
            $table->string('emailpdg');
            $table->string('passpdg');
            $table->string('role')->default('pdg');
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
        Schema::dropIfExists('pdgs');
    }
}

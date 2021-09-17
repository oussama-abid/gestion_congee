<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nomemploye');
            $table->string('prenomemploye');
            $table->string('poste');
            $table->string('emailemploye');
            $table->string('tel');
            $table->integer('nbjours_tot')->default('30');
            $table->integer('nbjours_rest')->default('30');
            $table->string('passemploye');
            $table->string('role')->default('employe');
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
        Schema::dropIfExists('employes');
    }
}

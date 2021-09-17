<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nomadmin');
            $table->string('prenomadmin');
            $table->string('poste');
            $table->string('tel');
            $table->integer('nbjours_tot')->default('30');
            $table->integer('nbjours_rest')->default('30');
            $table->string('emailadmin');
            $table->string('passadmin');
            $table->string('role')->default('admin');
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
        Schema::dropIfExists('admins');
    }
}

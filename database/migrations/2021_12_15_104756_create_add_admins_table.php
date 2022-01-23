<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_admins', function (Blueprint $table) {
            $table->id();
            $table->string('adminname');
            $table->string('adminmail');
            $table->string('adminarea');
            $table->string('adminpic')->nullable();
            $table->string('adminpass');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('add_admins');
    }
}

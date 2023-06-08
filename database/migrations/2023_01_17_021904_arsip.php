<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Arsip extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arsip', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id')->nullable();
            $table->string('judul');
            $table->longText('deskripsi');
            $table->string('file')->nullable();
            $table->string('ext')->nullable();
            $table->bigInteger('ukuran')->nullable();
            $table->timestamps();
        });
        Schema::table('arsip', function (Blueprint $table) {          
            $table->foreign('users_id')->references('id')->on('users')->nullable();                      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

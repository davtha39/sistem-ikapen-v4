<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Mtvs\EloquentApproval\ApprovalServiceProvider;

class Artikel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artikel', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('users_id')->nullable();
            $table->string('judul');
            $table->string('foto')->nullable();
            $table->longText('isi');
            $table->timestamps();
        });
        Schema::table('artikel', function (Blueprint $table) {          
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApprovalpermohonanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approvalpermohonan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('permohonan_id');
            $table->unsignedBigInteger('users_id')->nullable();
            $table->enum('approval', [
                'disetujui',
                'ditolak',
                'belum_ditinjau'
            ])->default('belum_ditinjau');
            $table->string('penguruscomment')->nullable();
            $table->timestamps();
        });
        Schema::table('approvalpermohonan', function (Blueprint $table) {  
            $table->foreign('permohonan_id')->references('id')->on('permohonan');           
            $table->foreign('users_id')->references('id')->on('users');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('approvalpermohonan');
    }
}

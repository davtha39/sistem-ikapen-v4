<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermohonanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permohonan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id');
            //$table->unsignedBigInteger('approvalpermohonan_id')->nullable();
            $table->enum('jenis_permohonan', [
                'Cetak Kartu Anggota', 
                'Permohonan BPJS',
                'Penerbitan Surat Pensiun', 
                'Lainnya'
            ]);
            $table->longText('catatan')->nullable();
            $table->timestamps();
        });

        Schema::table('permohonan', function (Blueprint $table){
            $table->foreign('users_id')->references('id')->on('users');
            //$table->foreign('approvalpermohonan_id')->references('id')->on('approvalpermohonan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permohonan');
    }
}

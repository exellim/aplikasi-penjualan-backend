<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKunjungansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kunjungan', function (Blueprint $table) {
            $table->id();
            $table->String('nama')->nullable(false);
            $table->String('tujuan')->nullable(false);
            $table->date('tanggal_tujuan')->nullable(false);
            $table->dateTime('jam_mulai')->nullable(false);
            $table->dateTime('jam_selesai')->nullable(true);
            $table->text('catatan')->nullable(true);
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
        Schema::dropIfExists('kunjungan');
    }
}

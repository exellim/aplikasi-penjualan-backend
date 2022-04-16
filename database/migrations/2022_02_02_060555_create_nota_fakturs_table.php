<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotaFaktursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nota_faktur', function (Blueprint $table) {
            $table->id();
            $table->String('notaId');
            $table->String('nama');
            $table->integer('nomor_telfon');
            $table->json('nama_produk');
            $table->json('qty_produk');
            $table->json('harga_produk');
            $table->json('subtotal_harga');
            $table->enum('status', ['approved', 'rejected', 'pending'])->default('pending');
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
        Schema::dropIfExists('nota_fakturs');
    }
}

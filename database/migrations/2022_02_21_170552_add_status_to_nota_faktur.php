<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToNotaFaktur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nota_faktur', function (Blueprint $table) {
            $table->enum('status', ['approved', 'rejected', 'pending'])->default('pending')->after('subtotal_harga');
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nota_faktur', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}

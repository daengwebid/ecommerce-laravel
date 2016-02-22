<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paids', function (Blueprint $table) {
            $table->increments('id');
            $table->string('invoice')->unique();
            $table->string('nama_pemilik');
            $table->string('bank_from');
            $table->string('no_rekening');
            $table->string('bank_to');
            $table->integer('jumlah');
            $table->string('bukti_transfer');
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
        Schema::drop('paids');
    }
}

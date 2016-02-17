<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function(Blueprint $table){
            $table->increments('id');
            $table->string('nama_toko', 50);
            $table->string('nama_pemilik', 50);
            $table->text('alamat');
            $table->char('provinsi_id', 2);
            $table->char('kabupaten_id', 4);
            $table->string('sms', 12);
            $table->string('bbm', 8);
            $table->string('line');
            $table->string('instagram');
            $table->string('email');
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
        Schema::drop('settings');
    }
}

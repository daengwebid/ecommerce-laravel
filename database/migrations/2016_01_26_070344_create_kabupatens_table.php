<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKabupatensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kabupatens', function(Blueprint $table){
            $table->char('id', 4);
            $table->primary('id');
            $table->char('provinsi_id', 2);
            $table->string('nama_kabupaten');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('kabupatens');
    }
}

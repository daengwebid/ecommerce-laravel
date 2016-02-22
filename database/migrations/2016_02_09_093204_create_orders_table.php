<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id');
            $table->string('invoice');
            $table->integer('paid_id')->nullable();
            $table->integer('jne');
            $table->string('province');
            $table->string('city');
            $table->string('kode_pos');
            $table->text('alamat');
            $table->text('catatan')->nullable();
            $table->string('status_order');
            $table->text('catatan_status');
            $table->string('no_resi');
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
        Schema::drop('orders');
    }
}

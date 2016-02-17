<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelatoinshipsToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->integer('customer_id')->unsigned()->change();
            $table->foreign('customer_id')->references('id')->on('customers')
                    ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('paid_id')->unsigned()->change();
            $table->foreign('paid_id')->references('id')->on('paids')
                    ->onUpdate('cascade');
                    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('orders_customer_id_foreign');
            $table->dropForeign('orders_paid_id_foreign');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->dropIndex('orders_customer_id_foreign');
            $table->dropIndex('orders_paid_id_foreign');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->integer('customer_id')->change();
            $table->integer('paid_id')->change();
        });
    }
}

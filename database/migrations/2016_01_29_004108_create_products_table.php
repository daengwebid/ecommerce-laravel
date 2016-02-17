<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_produk');
            $table->string('nama_produk');
            $table->string('slug')->unique();
            $table->integer('kategori_id');
            $table->integer('supplier_id');
            $table->text('deskripsi')->nullable();
            $table->integer('berat');
            $table->integer('stok');
            $table->integer('media_image_id');
            $table->boolean('publish');
            $table->integer('harga');
            $table->integer('diskon');
            $table->integer('harga_jual');
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
        Schema::drop('products');
    }
}

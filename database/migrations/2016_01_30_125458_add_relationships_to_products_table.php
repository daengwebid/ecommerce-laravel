<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipsToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->integer('kategori_id')->unsigned()->change();
            $table->foreign('kategori_id')->references('id')->on('categories')
                    ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('supplier_id')->unsigned()->change();
            $table->foreign('supplier_id')->references('id')->on('suppliers')
                    ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('media_image_id')->unsigned()->nullable()->change();
            $table->foreign('media_image_id')->references('id')->on('media_images')
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
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_kategori_id_foreign');
            $table->dropForeign('products_supplier_id_foreign');
            $table->dropForeign('products_media_image_id_foreign');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->dropIndex('products_kategori_id_foreign');
            $table->dropIndex('products_supplier_id_foreign');
            $table->dropIndex('products_media_image_id_foreign');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->integer('kategori_id')->change();
            $table->integer('supplier_id')->change();
            $table->integer('media_image_id')->change();
        });
    }
}

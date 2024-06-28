<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TambahForeignKeyToBarangMasukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('barang_masuk', function (Blueprint $table) {
            $table->unsignedInteger('id_produk')->change();
            $table->foreign('id_produk')
                ->references('id_produk')
                ->on('produk')
                ->onUpdate('restrict')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('barang_masuk', function (Blueprint $table) {
            $table->integer('id_produk')->change();
            $table->dropForeign('barang_masuk_id_produk_foreign');
        });
    }
}

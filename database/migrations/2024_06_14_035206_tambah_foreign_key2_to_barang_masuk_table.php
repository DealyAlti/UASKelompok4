<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TambahForeignKey2ToBarangMasukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('barang_masuk', function (Blueprint $table) {
            $table->unsignedInteger('id_supplier')->change();
            $table->foreign('id_supplier')
                ->references('id_supplier')
                ->on('supplier')
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
            $table->integer('id_supplier')->change();
            $table->dropForeign('barang_masuk_id_supplier_foreign');
        });
    }
}

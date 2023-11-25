<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnItembrandToInventaris extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inventaris', function (Blueprint $table) {
            $table->dropColumn('nama_barang');
            $table->dropColumn('qty');
            $table->bigInteger('item_id', false, true)->length(20)->after('status');
            $table->bigInteger('brand_id', false, true)->length(20)->after('item_id');
        });
        DB::statement('ALTER TABLE inventaris CHANGE item_id item_id BIGINT(20) UNSIGNED NOT NULL');
        DB::statement('ALTER TABLE inventaris CHANGE brand_id brand_id BIGINT(20) UNSIGNED NOT NULL');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inventaris', function (Blueprint $table) {
            $table->dropColumn('item_id');
            $table->dropColumn('brand_id');
        });
    }
}

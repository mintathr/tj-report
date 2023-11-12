<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nomor_tiket', false, true)->length(10)->zerofill()->unique();
            $table->foreignId('user_id')->constrained('users')->zerofill();
            $table->unsignedBigInteger('halte_id');
            $table->text('nama_barang');
            $table->enum('kondisi', ['Rusak', 'Normal', 'Output Beda Tegangan']);
            $table->string('serial_number', 50)->unique();
            $table->enum('status', ['Barang ditarik ke kantor', 'Sudah terpasang', 'Pengembalian barang/ replace']);
            $table->bigInteger('nik_petugas_halte', false, true);
            $table->string('nama_petugas_halte');
            $table->timestamps();
        });
        DB::statement('ALTER TABLE assets CHANGE nomor_tiket nomor_tiket BIGINT(10) UNSIGNED ZEROFILL');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assets');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventaris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('halte_id')->constrained('bus_stops');
            $table->string('nama_barang', 255);
            $table->string('serial_number', 50);
            $table->enum('status', ['Berfungsi', 'Tidak Normal'])->default('Berfungsi');
            $table->tinyInteger('qty', false, true)->length(1);
            $table->Integer('user_id', false, true)->length(6);
            $table->timestamps();
        });
        DB::statement('ALTER TABLE inventaris CHANGE user_id user_id INT(6) UNSIGNED ZEROFILL');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventaris');
    }
}

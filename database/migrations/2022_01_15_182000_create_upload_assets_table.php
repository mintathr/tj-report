<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUploadAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upload_assets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('asset_id')->nullable();
            $table->integer('user_id', false, true)->length(6)->zerofill();
            $table->string('folder');
            $table->string('filename');
            $table->timestamps();
        });
        DB::statement('ALTER TABLE upload_assets CHANGE user_id user_id INT(6) UNSIGNED ZEROFILL');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('upload_assets');
    }
}

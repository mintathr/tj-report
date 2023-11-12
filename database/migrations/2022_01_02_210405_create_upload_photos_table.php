<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUploadPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upload_photos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('activity_id')->nullable();
            #$table->foreign('activity_id')->references('id')->on('activities');
            $table->integer('user_id', false, true)->length(6)->zerofill();
            $table->string('folder');
            $table->string('filename');
            $table->enum('status_poto', ['Perbaikan', 'Problem'])->nullable();
            $table->timestamps();
        });
        DB::statement('ALTER TABLE upload_photos CHANGE user_id user_id INT(6) UNSIGNED ZEROFILL');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('upload_photos');
    }
}

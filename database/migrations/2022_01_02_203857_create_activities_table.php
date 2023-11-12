<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nomor_tiket', false, true)->length(10)->zerofill()->unique();
            $table->unsignedBigInteger('halte_awal_id')->nullable();
            $table->unsignedBigInteger('halte_akhir_id');
            $table->text('problem');
            $table->text('root_cause')->nullable();
            $table->unsignedBigInteger('helptopic_id');
            $table->foreign('helptopic_id')->references('id')->on('help_topics');
            $table->text('action')->nullable();
            $table->enum('status', ['Close', 'Open'])->nullable();
            $table->string('assign_to')->nullable();
            $table->integer('user_id', false, true)->length(6)->zerofill();
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
        DB::statement('ALTER TABLE activities CHANGE nomor_tiket nomor_tiket BIGINT(10) UNSIGNED ZEROFILL');
        DB::statement('ALTER TABLE activities CHANGE user_id user_id INT(6) UNSIGNED ZEROFILL');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
}

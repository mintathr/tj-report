<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id', false, true)->unique()->length(6)->zerofill();
            $table->string('name');
            $table->string('password');
            $table->boolean('is_admin')->nullable();
            $table->string('role', 15);
            $table->integer('block', false, true)->length(3);
            $table->date('last_change');
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });
        DB::statement('ALTER TABLE users CHANGE user_id user_id INT(6) UNSIGNED ZEROFILL NOT NULL');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

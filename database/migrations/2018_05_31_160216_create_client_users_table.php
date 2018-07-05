<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('fb_id')->nullable();
            $table->string('gplus_jd')->nullable();
            $table->string('phone_number');
            $table->string('address');
            $table->string('udid');
            $table->integer('type')->default(0);
            $table->integer('member')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_users');
    }
}

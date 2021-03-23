<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('username')->nullable();
            $table->string('fb_id')->nullable();
            $table->string('email')->unique();
            $table->string('sust_mail')->unique();
            $table->string('email2')->nullable();
            $table->string('registration_no')->nullable();
            $table->string('password', 60);
            $table->integer('active')->default(1); // 1 means active
            $table->integer('email_counter')->default(0);
            $table->integer('is_emailing_active')->default(1); // 1 means active
            $table->rememberToken();
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
        Schema::drop('users');
    }
}

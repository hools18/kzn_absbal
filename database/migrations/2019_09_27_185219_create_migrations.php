<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMigrations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->text('surname');
            $table->text('patronymic')->nullable();
            $table->timestamp('birthday');
            $table->text('login');
            $table->text('password');
            $table->text('email')->unique();
            $table->text('phone')->unique();
            $table->text('biometrics')->nullable();
            $table->timestamp('confirmation_date')->nullable();
            $table->text('device_id');
            $table->timestamps();
        });
        Schema::create('documents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->integer('series');
            $table->integer('number');
            $table->text('issuing_authority');
            $table->timestamp('date_of_issue');
            $table->timestamp('time_expired')->nullable();
            $table->text('type')->nullable();
            $table->timestamps();
        });
        Schema::create('keys', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->text('type');
            $table->timestamp('time_expired')->nullable();
            $table->text('hash_key');
            $table->boolean('is_active')->default(true);
            $table->timestamp('inactive_time')->nullable();
            $table->timestamps();
        });
        Schema::create('key_users', function (Blueprint $table) {
            $table->bigInteger('user_id');
            $table->bigInteger('key_id');
        });
        Schema::create('operations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('external_id');
            $table->bigInteger('user_id');
            $table->bigInteger('key_id');
            $table->integer('contract_id');
            $table->text('rejection_reason')->nullable();
            $table->timestamp('confirmation_time')->nullable();
            $table->text('crypto_data')->nullable();
            $table->timestamps();
        });
        Schema::create('contracts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('external_id');
            $table->text('text');
            $table->timestamps();
        });
        Schema::create('operation_user_key', function (Blueprint $table) {
            $table->bigInteger('operation_id');
            $table->bigInteger('user_id');
            $table->bigInteger('key_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('documents');
        Schema::dropIfExists('keys');
        Schema::dropIfExists('key_users');
        Schema::dropIfExists('operations');
        Schema::dropIfExists('contracts');
        Schema::dropIfExists('operation_user_key');
    }
}

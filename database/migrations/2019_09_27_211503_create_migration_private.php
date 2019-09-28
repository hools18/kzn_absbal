<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMigrationPrivate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('private_db')->create('users', function (Blueprint $table) {
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
            $table->text('workplace');
            $table->text('unit_number');
            $table->timestamps();
        });
        Schema::connection('private_db')->create('applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('serial');
            $table->integer('number');
            $table->bigInteger('client_id');
            $table->text('reason_reject')->nullable();
            $table->timestamps();
        });
        Schema::connection('private_db')->create('application_decision', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('client_id');
            $table->text('rejection_reason')->nullable();
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
        Schema::connection('private_db')->dropIfExists('users');
        Schema::connection('private_db')->dropIfExists('applications');
        Schema::connection('private_db')->dropIfExists('application_decision');
    }
}

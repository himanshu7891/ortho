<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffNotificationsTable extends Migration
{
    public function up()
    {
        Schema::create('staff_notifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('location_name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email_address')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('notify_sms')->nullable();
            $table->string('notify_voice')->nullable();
            $table->string('notify_email')->nullable();
            $table->string('notify_new_patient')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

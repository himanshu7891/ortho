<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email_address')->unique();
            $table->string('location_name');
            $table->string('address_line_1');
            $table->string('address_line_2')->nullable();
            $table->string('phone_number');
            $table->string('fax_number');
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('zip_code');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('accept_emergencies');
            $table->string('coming_soon');
            $table->string('active');
            $table->string('directions')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasesModalsTable extends Migration
{
    public function up()
    {
        Schema::create('casemaster', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('patient_first_name');
            $table->string('patient_last_name');
            $table->date('patient_dob');
            $table->string('patient_gender')->nullable();
            $table->longText('description');
            $table->boolean('status')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrthoChatsTable extends Migration
{
    public function up()
    {
        Schema::create('ortho_chats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('email')->nullable();
            $table->string('ortho_chat_access')->nullable();
            $table->string('location')->nullable();
            $table->string('action')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

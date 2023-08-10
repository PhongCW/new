<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('m_users', function (Blueprint $table) {
            $table->integer("id");
            $table->timestamps();
            $table->string("user_name", 100);
            $table->string("password", 100);
            $table->tinyInteger("role");
            $table->boolean("del_flg");
            $table->integer("created_user");
            $table->dateTime("created_datetime");
            $table->integer("updated_user");
            $table->dateTime("updated_datetime");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_users');
    }
};

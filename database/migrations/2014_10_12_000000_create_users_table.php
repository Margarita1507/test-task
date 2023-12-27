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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('phone_number')->unique();
            $table->unsignedBigInteger('link_id');
            $table->unsignedBigInteger('win_id');
            $table->timestamps();

            $table->index('link_id', 'user_link_idx');
            $table->index('win_id', 'user_win_idx');

            $table->foreign('link_id', 'user_link_fx')->on('links')->references('id');
            $table->foreign('win_id', 'user_win_fx')->on('wins')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

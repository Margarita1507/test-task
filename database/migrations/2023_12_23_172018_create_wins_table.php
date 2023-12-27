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
        Schema::create('wins', function (Blueprint $table) {
            $table->id();
            $table->string('win_amount');
            $table->string('win_history');
            $table->string('last_random_value');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('wins', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::dropIfExists('wins');
    }
};

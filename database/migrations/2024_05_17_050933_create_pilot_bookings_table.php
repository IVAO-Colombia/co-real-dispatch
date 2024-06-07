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
        Schema::create('pilot_bookings', function (Blueprint $table) {
            $table->id();

            $table->string("airline");
            $table->unsignedBigInteger("user_id");
            $table->string("hub");
            $table->string("aircraft");
            $table->string("briefing")->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pilot_bookings');
    }
};

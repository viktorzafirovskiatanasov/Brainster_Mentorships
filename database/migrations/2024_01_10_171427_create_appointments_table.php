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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
//            $table->foreignIdFor(\App\Models\User::class)->constrained();
            $table->foreignId('user_id')
                ->references('id')
                ->on('users');
            $table->string('name');

            $table->string('email');
            $table->string('phone');
            $table->dateTime('appointment_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};

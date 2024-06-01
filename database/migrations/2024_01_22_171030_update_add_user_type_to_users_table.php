<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('type', ['doctor', 'patient'])->after('email');
            $table->string('phone')->after('type');
        });
        \Illuminate\Support\Facades\DB::table('users')->where('id' , 1)
            ->update([
                'type' => 'doctor'
            ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropColumn('type');
            $table->dropColumn('phone');
        });
    }
};

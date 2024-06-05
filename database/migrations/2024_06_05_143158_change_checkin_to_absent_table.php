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
        Schema::rename('t_checkin', 't_absent');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('absent', function (Blueprint $table) {
            //
        });
    }
};

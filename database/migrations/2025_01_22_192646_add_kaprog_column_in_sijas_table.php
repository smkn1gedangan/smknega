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
        Schema::table('sijas', function (Blueprint $table) {
            $table->string("photo_kaprog");
            $table->string("nama_kaprog");
            $table->string("ket_kaprog");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sijas', function (Blueprint $table) {
            //
        });
    }
};

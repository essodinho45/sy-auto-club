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
        Schema::table('licences', function (Blueprint $table) {
            $table->string('personal')->nullable();
            $table->string('licence_f')->nullable();
            $table->string('licence_b')->nullable();
            $table->string('licence1')->nullable();
            $table->string('licence2')->nullable();
            $table->string('id_f')->nullable();
            $table->string('id_b')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('licences', function (Blueprint $table) {
            //
        });
    }
};

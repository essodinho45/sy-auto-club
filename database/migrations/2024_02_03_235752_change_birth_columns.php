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
        Schema::table('licences', function (Blueprint $table) {
            $table->dropColumn('birth_date_en');
            $table->dropColumn('birth_date');
        });
        Schema::table('licences', function (Blueprint $table) {
            $table->year('birth_date')->nullable();
            $table->year('birth_date_en')->nullable();
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

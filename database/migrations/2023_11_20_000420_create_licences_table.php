<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('licences', function (Blueprint $table) {
            $table->id();
            $table->string('licence_number');
            $table->date('valid_to');
            $table->string('driving_licence_number');
            $table->date('driving_valid_to');
            $table->string('first_name');
            $table->string('second_name');
            $table->string('father_name');
            $table->string('birth_place');
            $table->date('birth_date');
            $table->string('residence_place');
            $table->string('first_name_en');
            $table->string('second_name_en');
            $table->string('father_name_en');
            $table->string('birth_place_en');
            $table->date('birth_date_en');
            $table->string('residence_place_en');
            $table->string('phone');
            $table->string('email');
            $table->string('note');
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('licences');
    }
};

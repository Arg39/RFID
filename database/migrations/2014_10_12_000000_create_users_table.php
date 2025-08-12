<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rfid_cards', function (Blueprint $table) {
            $table->string('uid')->primary(); // UID from card, used as primary key
            $table->string('rfid_code')->unique()->nullable();
            $table->enum('status', ['unregistered', 'registered'])->default('unregistered');
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('nisn')->unique();
            $table->string('email')->unique()->nullable();
            $table->string('password');
        
            $table->uuid('current_class_id')->nullable();
            $table->foreign('current_class_id')->references('id')->on('classes')->onDelete('set null');
        
            $table->enum('role', ['student', 'teacher', 'admin'])->default('student');
        
            $table->string('rfid_card_uid')->nullable()->unique();
            $table->foreign('rfid_card_uid')->references('uid')->on('rfid_cards')->onDelete('set null');
        
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('rfid_cards');
    }
};

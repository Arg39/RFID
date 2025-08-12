<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('absences', function (Blueprint $table) {
            $table->id();
        
            $table->uuid('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        
            $table->date('date');
        
            $table->enum('status', ['present', 'absent', 'sick', 'leave'])->default('present');
            $table->time('check_in')->nullable();
            $table->time('check_out')->nullable();
        
            $table->timestamps();
        
            $table->unique(['user_id', 'date']);
        });        
    }

    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }    
};

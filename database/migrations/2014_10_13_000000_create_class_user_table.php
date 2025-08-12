<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('class_user', function (Blueprint $table) {
            $table->id();
            $table->uuid('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        
            $table->uuid('class_id');
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');
        
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->timestamps();
        
            $table->unique(['user_id', 'class_id', 'start_date']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('class_user');
    }
};

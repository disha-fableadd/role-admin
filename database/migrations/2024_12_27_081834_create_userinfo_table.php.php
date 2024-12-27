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
        Schema::create('userinfo', function (Blueprint $table) {
            $table->id('uinfoid'); // auto-incrementing ID for user info
            $table->unsignedBigInteger('uid'); // foreign key referencing users table
            $table->string('fname'); // first name
            $table->string('lname'); // last name
            $table->string('image')->nullable(); // profile image (nullable)
            $table->enum('gender', ['male', 'female', 'other'])->nullable(); // gender
            $table->string('contact')->nullable(); // contact number (nullable)
            $table->string('email')->unique(); // email (should be unique)
            $table->text('address')->nullable(); // address (nullable)
            $table->timestamps(); // created_at and updated_at columns

            // Foreign key relationship
            $table->foreign('uid')->references('id')->on('userss')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userinfo');
    }
};

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
        Schema::create('projects', function (Blueprint $table) {
            $table->id(); // auto-incrementing ID for project
            $table->string('name'); // column for project name
            $table->unsignedBigInteger('cid'); // foreign key referencing categories table
            $table->text('description'); // column for project description
            $table->string('timeline'); // column for project timeline
            $table->unsignedBigInteger('manager_id'); // foreign key referencing the user or manager table
            $table->unsignedBigInteger('staff_id'); // foreign key referencing the user or staff table
            $table->timestamps(); // created_at and updated_at columns

            // Foreign key relationships
            $table->foreign('cid')->references('cid')->on('categories')->onDelete('cascade');
            $table->foreign('manager_id')->references('id')->on('userss')->onDelete('cascade'); // Assuming user table for manager
            $table->foreign('staff_id')->references('id')->on('userss')->onDelete('cascade'); // Assuming user table for staff
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};

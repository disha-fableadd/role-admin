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
            $table->id(); 
            $table->string('name'); 
            $table->unsignedBigInteger('cid');
            $table->text('description');
            $table->string('timeline'); 
            $table->unsignedBigInteger('manager_id');
            $table->unsignedBigInteger('staff_id'); 
            $table->timestamps();

            // Foreign key relationships
            $table->foreign('cid')->references('cid')->on('categories')->onDelete('cascade');
            $table->foreign('manager_id')->references('id')->on('userss')->onDelete('cascade'); 
            $table->foreign('staff_id')->references('id')->on('userss')->onDelete('cascade'); 
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

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
        // Creating tags table
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('tag'); // Storing tag names
            $table->timestamps();
        });

        // Creating post_tag pivot table
        Schema::create('post_tag', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('tag_id');
            $table->timestamps();
        
            // Foreign key constraints
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
            
            // Prevent duplicate entries
            $table->unique(['post_id', 'tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Dropping post_tag pivot table first
        Schema::dropIfExists('post_tag');

        // Dropping tags table
        Schema::dropIfExists('tags');
    }
};

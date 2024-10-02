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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle');
            $table->text('description');
            $table->Integer('category_id');
            $table->Integer('subcategory_id')->nullable();
            $table->Integer('district_id')->nullable(); 
            $table->Integer('subdistrict_id')->nullable();
            $table->string('image')->nullable();
            $table->Integer('author_id');
            $table->string('role');
            $table->string('slug')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};

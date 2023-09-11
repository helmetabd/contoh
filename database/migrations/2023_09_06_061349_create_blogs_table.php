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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->integer('author_id');
            $table->integer('category_id')->unsigned()->nullable();
            $table->string('title');
            $table->string('seo_title')->nullable();
            $table->string('excerpt')->nullable();
            $table->longText('body');
            $table->string('image')->nullable();
            $table->string('slug');
            // $table->string('meta_description')->nullable();
            // $table->string('meta_keywords')->nullable();
            $table->enum('status', ['published', 'draft', 'pending']);
            $table->boolean('featured');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};

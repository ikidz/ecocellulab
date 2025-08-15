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
        Schema::create('aboutus_contents', function (Blueprint $table) {
            $table->id();
            $table->string('banner_img')->nullable();
            $table->string('page_title');
            $table->string('story_img')->nullable();
            $table->longText('story_content')->nullable();
            $table->json('benefits')->nullable();
            $table->string('vision_img')->nullable();
            $table->longText('vision_content')->nullable();
            $table->string('slug')->unique();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_image')->nullable();
            $table->boolean('is_publish')->default(1);
            $table->timestamps();
            $table->softDeletes( $column = 'deleted_at' );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aboutus_contents');
    }
};

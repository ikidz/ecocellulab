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
        Schema::create('researches', function (Blueprint $table) {
            $table->id();
            $table->string('thumb')->nullable();
            $table->string('img')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->longText('content')->nullable();
            $table->date('post_date')->nullable();
            $table->date('start')->nullable();
            $table->date('end')->nullable();
            $table->boolean('is_publish')->default(1);
            $table->string('slug')->unique();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_image')->nullable();
            $table->timestamps();
            $table->softDeletes( $column = 'deleted_at' );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('researches');
    }
};

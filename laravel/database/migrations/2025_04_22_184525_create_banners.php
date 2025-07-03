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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['image','video','youtube'])->default('image');
            $table->string('img')->nullable();
            $table->string('video')->nullable();
            $table->string('youtube_id')->nullable();
            $table->string('name')->nullable();
            $table->string('title')->nullable();
            $table->text('subtitle')->nullable();
            $table->string('hotspot_youtube_id')->nullable();
            $table->text('url')->nullable();
            $table->integer('order')->default(0);
            $table->date('start');
            $table->date('end')->nullable();
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
        Schema::dropIfExists('banners');
    }
};

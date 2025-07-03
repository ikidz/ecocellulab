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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('avartar')->nullable();
            $table->string('name');
            $table->string('position')->nullable();
            $table->integer('rating')->default(5);
            $table->longText('content');
            $table->date('post_date')->nullable();
            $table->date('start');
            $table->date('end')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_publish')->default(true);
            $table->timestamps();
            $table->softDeletes( $column = 'deleted_at' );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};

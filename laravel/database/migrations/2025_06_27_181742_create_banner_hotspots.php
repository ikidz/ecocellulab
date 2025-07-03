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
        Schema::create('banner_hotspots', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('banner_id')->unsigned();
            $table->string('img')->nullable();
            $table->string('text')->nullable();
            $table->integer('order')->default(0);
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
        Schema::dropIfExists('banner_hotspots');
    }
};

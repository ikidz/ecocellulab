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
        Schema::create('web_settings', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['text','longText','image','link','tel','email','map','file','code'])->default('text');
            $table->string('title')->nullable();
            $table->string('key')->nullable();
            $table->string('img')->nullable();
            $table->longText('value_th')->nullable();
            $table->longText('value_en')->nullable();
            $table->timestamps();
            $table->softDeletes( $column = 'deleted_at' );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('web_settings');
    }
};

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
        Schema::create('team_socials', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('team_id')->unsigned();
            $table->enum('platform', ['facebook', 'twitter', 'instagram', 'linkedin', 'youtube'])->default('facebook');
            $table->string('url');
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
        Schema::dropIfExists('team_socials');
    }
};

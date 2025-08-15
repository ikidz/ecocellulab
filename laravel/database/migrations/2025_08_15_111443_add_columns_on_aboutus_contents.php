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
        Schema::table('aboutus_contents', function( Blueprint $table ){
            $table->after('page_title', function( $table ){
                $table->string('home_section_title')->nullable();
                $table->string('home_section_img')->nullable();
                $table->longText('home_section_content')->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

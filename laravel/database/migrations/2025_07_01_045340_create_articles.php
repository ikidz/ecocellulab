<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('thumb')->nullable();
            $table->string('img')->nullable();
            $table->string('title')->nullable();
            $table->text('caption')->nullable();
            $table->longText('description')->nullable();
            $table->date('post_date');
            $table->date('start');
            $table->date('end')->nullable();
            $table->boolean('is_publish')->default(1)->index();
            $table->string('slug')->nullable();
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
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
};

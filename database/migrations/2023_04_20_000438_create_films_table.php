<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Таблица фильмов
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('poster_image', 255)->nullable();
            $table->string('preview_image', 255)->nullable();
            $table->string('background_image', 255)->nullable();
            $table->char('background_color', 9)->nullable();
            $table->string('video_link', 255)->nullable();
            $table->string('preview_video_link', 255)->nullable();
            $table->string('description', 1000)->nullable();
            $table->string('director', 255)->nullable();
            $table->unsignedInteger('run_time')->nullable();
            $table->unsignedInteger('released')->nullable();
            $table->string('imdb_id')->unique();
            $table->set('status', ['pending', 'on moderation', 'ready'])->nullable();
            $table->unsignedInteger('rating')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('films');
    }
};

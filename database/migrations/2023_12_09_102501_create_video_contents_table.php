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
        Schema::create('video_contents', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('title_position')->nullable();
            $table->string('subtitle_position')->nullable();
            $table->string('video_id')->nullable();
            $table->string('src')->nullable();
            $table->string('poster')->nullable();
            $table->string('height')->nullable();
            $table->string('width')->nullable();
            $table->enum('controlslist', ['nodownload', 'nofullscreen', 'noremoteplayback'])->nullable();
            $table->enum('crossorigin', ['anonymous', 'use-credentials'])->nullable();
            $table->enum('preload', ['auto', 'metadata', 'none'])->nullable();
            $table->boolean('autoplay')->nullable();
            $table->boolean('controls')->nullable();
            $table->boolean('muted')->nullable();
            $table->boolean('loop')->nullable();
            $table->boolean('playsinline')->nullable();
            $table->boolean('disablepictureinpicture')->nullable();
            $table->boolean('disableremoteplayback')->nullable();
            $table->text('class')->nullable();
            $table->longText('style')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('video_contents');
    }
};

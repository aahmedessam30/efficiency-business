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
        Schema::create('iframe_contents', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('title_position')->nullable();
            $table->string('subtitle_position')->nullable();
            $table->string('iframe_title')->nullable();
            $table->string('iframe_id')->nullable();
            $table->string('src')->nullable();
            $table->string('srcdoc')->nullable();
            $table->string('width')->nullable();
            $table->string('height')->nullable();
            $table->boolean('allow')->nullable();
            $table->boolean('allowfullscreen')->nullable();
            $table->enum('loading', ['eager', 'lazy'])->nullable();
            $table->enum('sandbox', ['allow-downloads', 'allow-forms', 'allow-modals', 'allow-orientation-lock', 'allow-pointer-lock', 'allow-popups', 'allow-popups-to-escape-sandbox', 'allow-presentation', 'allow-same-origin', 'allow-scripts', 'allow-storage-access-by-user-activation', 'allow-top-navigation', 'allow-top-navigation-by-user-activation'])->nullable();
            $table->enum('referrerpolicy', ['no-referrer', 'no-referrer-when-downgrade', 'origin', 'origin-when-cross-origin', 'same-origin', 'strict-origin', 'strict-origin-when-cross-origin', 'unsafe-url'])->nullable();
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
        Schema::dropIfExists('iframe_contents');
    }
};

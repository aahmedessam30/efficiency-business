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
        Schema::create('image_contents', function (Blueprint $table) {
            $table->id();
            $table->string('src')->nullable();
            $table->string('srcset')->nullable();
            $table->string('alt')->nullable();
            $table->string('width')->nullable();
            $table->string('height')->nullable();
            $table->string('elementtiming')->nullable();
            $table->string('sizes')->nullable();
            $table->string('usemap')->nullable();
            $table->enum('loading', ['eager', 'lazy'])->nullable();
            $table->enum('crossorigin', ['anonymous', 'use-credentials'])->nullable();
            $table->enum('decoding', ['sync', 'async', 'auto'])->nullable();
            $table->enum('fetchpriority', ['auto', 'high', 'low'])->nullable();
            $table->enum('referrerpolicy', ['no-referrer', 'no-referrer-when-downgrade', 'origin', 'origin-when-cross-origin', 'same-origin', 'strict-origin', 'strict-origin-when-cross-origin', 'unsafe-url'])->nullable();
            $table->boolean('ismap')->nullable();
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
        Schema::dropIfExists('image_contents');
    }
};

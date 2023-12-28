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
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Page::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(\App\Models\SectionType::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};

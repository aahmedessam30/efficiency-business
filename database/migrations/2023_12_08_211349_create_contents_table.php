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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Section::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->morphs('contentable');
            $table->string('name')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->boolean('is_visible')->default(true);
            $table->boolean('is_collapsed')->default(false);
            $table->boolean('is_collapsible')->default(false);
            $table->boolean('is_sortable')->default(false);
            $table->boolean('is_searchable')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};

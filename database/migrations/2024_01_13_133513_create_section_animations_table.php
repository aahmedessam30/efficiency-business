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
        Schema::create('section_animations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Section::class)->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name')->nullable();
            $table->string('delay')->nullable();
            $table->string('duration')->nullable();
            $table->string('easing')->nullable();
            $table->string('offset')->nullable();
            $table->string('anchor_placement')->nullable();
            $table->string('throttle')->nullable();
            $table->string('start_event')->nullable();
            $table->string('stop_event')->nullable();
            $table->string('initial_class_name')->nullable();
            $table->string('animated_class_name')->nullable();
            $table->string('debounce_delay')->nullable();
            $table->string('throttle_delay')->nullable();
            $table->boolean('once')->nullable();
            $table->boolean('mirror')->nullable();
            $table->boolean('disable')->nullable();
            $table->boolean('use_class_names')->nullable();
            $table->boolean('disable_mutation_observer')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('section_animations');
    }
};

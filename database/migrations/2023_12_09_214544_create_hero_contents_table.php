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
        Schema::create('hero_contents', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Section::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(\App\Models\ButtonContent::class)->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(\App\Models\ImageContent::class)->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(\App\Models\VideoContent::class)->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(\App\Models\AudioContent::class)->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(\App\Models\IframeContent::class)->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_contents');
    }
};

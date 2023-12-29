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
        Schema::create('button_contents', function (Blueprint $table) {
            $table->id();
            $table->string('text')->nullable();
            $table->string('button_id')->nullable();
            $table->string('href')->nullable();
            $table->string('target')->nullable();
            $table->string('rel')->nullable();
            $table->string('icon')->nullable();
            $table->string('icon_position')->nullable();
            $table->string('size')->nullable();
            $table->string('variant')->nullable();
            $table->string('form')->nullable();
            $table->string('formaction')->nullable();
            $table->string('popovertarget')->nullable();
            $table->enum('type', ['button', 'submit', 'reset'])->nullable();
            $table->enum('formenctype', ['application/x-www-form-urlencoded', 'multipart/form-data', 'text/plain'])->nullable();
            $table->enum('formmethod', ['get', 'post', 'dialog'])->nullable();
            $table->enum('formtarget', ['_self', '_blank', '_parent', '_top'])->nullable();
            $table->enum('popovertargetaction', ['hide', 'toggle', 'show'])->nullable();
            $table->boolean('disabled')->nullable();
            $table->boolean('loading')->nullable();
            $table->boolean('autofocus')->nullable();
            $table->boolean('autocomplete')->nullable();
            $table->boolean('formnovalidate')->nullable();
            $table->boolean('is_active')->nullable();
            $table->boolean('is_icon_active')->nullable();
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
        Schema::dropIfExists('button_contents');
    }
};

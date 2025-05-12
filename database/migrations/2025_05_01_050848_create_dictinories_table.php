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
        Schema::create('dictinories', function (Blueprint $table) {
            $table->id();
            $table->string('word')->unique();
            $table->text('definition');
            $table->string('example')->nullable();
            $table->string('translation')->nullable();
            $table->string('example_translation')->nullable();
            $table->string('pronunciation')->nullable();
            $table->foreignId('level_id')->nullable()->constrained('levels')->onDelete('restrict');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dictinories');
    }
};

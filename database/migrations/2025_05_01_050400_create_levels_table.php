<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('levels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        DB::table('levels')->insert([
            ['name' => 'Beginner/Elementary (A1)'],
            ['name' => 'Pre Intermediate (A2)'],
            ['name' => 'Intermediate (B1)'],
            ['name' => 'Upper Intermediate (B2)'],
            ['name' => 'Advanced (C1)'],
            ['name' => 'Proficient (C2)'],
          
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('levels');
    }
};

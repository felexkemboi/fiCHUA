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
        Schema::create('crimes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_id');
            $table->string('reporter_name')->nullable();
            $table->foreignId('county_id');
            $table->string('town')->nullable();
            $table->string('building')->nullable();
            $table->string('suspect_no')->nullable();
            $table->string('evidence_link')->nullable();
            $table->string('videos')->nullable();
            $table->string('audios')->nullable();
            $table->string('images')->nullable();
            $table->string('documents')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crimes');
    }
};

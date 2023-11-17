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
            $table->string('reporter_name');
            $table->foreignId('county_id');
            $table->string('town');
            $table->string('building');
            $table->string('suspect_no');
            $table->string('evidence_link');
            $table->string('videos');
            $table->string('audios');
            $table->string('images');
            $table->string('documents');
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

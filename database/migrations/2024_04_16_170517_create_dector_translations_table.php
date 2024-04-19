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
        Schema::create('dector_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('locale')->index();
            $table->string('name');
            $table->unique(['dector_id', 'locale']);
            $table->foreignId('dector_id')->references('id')->on('dectors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dector_translations');
    }
};

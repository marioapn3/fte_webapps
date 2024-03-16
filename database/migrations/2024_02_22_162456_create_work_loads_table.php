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
        Schema::create('work_loads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('detail_element_id')->constrained('detail_elements');
            $table->integer('work_time_per_year')->nullable();
            $table->integer('frequency_per_shift')->nullable();
            $table->decimal('total_hour')->nullable();
            $table->decimal('effective_time_per_shift')->nullable();
            $table->decimal('effective_time_per_year')->nullable();
            $table->decimal('work_load')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_loads');
    }
};

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
        Schema::create('standart_time_calculations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('detail_element_id')->constrained('detail_elements');
            $table->decimal('work_time', total: 8, places: 4)->nullable();
            $table->decimal('rating_factor')->nullable();
            $table->decimal('normal_time', total: 8, places: 4)->nullable();
            $table->decimal('allowance')->nullable();
            $table->decimal('standard_time')->nullable();
            $table->integer('order');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('standart_time_calculations');
    }
};

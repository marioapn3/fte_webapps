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
            $table->foreignId('work_element_id')->constrained('work_elements');
            $table->foreignId('sub_work_element_id')->constrained('sub_work_elements');
            $table->string('name');
            $table->integer('work_time');
            $table->integer('rating_factor');
            $table->integer('normal_time');
            $table->integer('allowance');
            $table->integer('standard_time');
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

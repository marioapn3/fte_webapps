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
        Schema::create('worker_needs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('work_element_id')->constrained('work_elements');
            $table->integer('operator_now')->nullable();
            $table->decimal('operator_load')->nullable();
            $table->string('desc')->nullable();
            $table->integer('operator_need')->nullable();
            $table->decimal('operator_load_need')->nullable();
            $table->string('desc_need')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('worker_needs');
    }
};

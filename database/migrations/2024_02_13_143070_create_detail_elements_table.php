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
        Schema::create('detail_elements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sub_work_element_id')->constrained('sub_work_elements');
            $table->string('name');
            $table->decimal('average', total: 8, places: 4)->nullable();
            $table->decimal('workload')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_elements');
    }
};

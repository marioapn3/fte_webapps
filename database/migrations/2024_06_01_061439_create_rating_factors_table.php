<?php

use App\Models\WorkStationDetail;
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
        Schema::create('rating_factors', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(WorkStationDetail::class)->constrained()->cascadeOnDelete();
            $table->decimal('skill');
            $table->decimal('effort');
            $table->decimal('working_condition');
            $table->decimal('consistency');
            $table->decimal('rating_factor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rating_factors');
    }
};

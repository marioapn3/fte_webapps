<?php

use App\Models\WorkStation;
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
        Schema::create('work_elements', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(WorkStationDetail::class)->constrained()->cascadeOnDelete();
            $table->decimal('total_squared');
            $table->decimal('average');
            $table->decimal('bka');
            $table->decimal('bkb');
            $table->decimal('n');
            $table->decimal('standart_deviation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_elements');
    }
};

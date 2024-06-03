<?php

use App\Models\WorkStation;
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
        Schema::create('absences', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(WorkStation::class)->constrained()->cascadeOnDelete();
            $table->integer("total_days");
            $table->integer("total_absences");
            $table->decimal("absence_rate");
            $table->integer('workforce_in');
            $table->integer('workforce_out');
            $table->decimal('workforce_avg');
            $table->decimal('lto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absences');
    }
};

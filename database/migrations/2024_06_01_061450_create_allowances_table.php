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
        Schema::create('allowances', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(WorkStationDetail::class)->constrained()->cascadeOnDelete();
            $table->integer('required_power');
            $table->integer('work_attitude');
            $table->integer('work_movement');
            $table->integer('eye_fatigue');
            $table->integer('working_condition');
            $table->integer('atmospheric_condition');
            $table->integer('good_environment');
            $table->integer('total');
            $table->decimal('total_rate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('allowances');
    }
};

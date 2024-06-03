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
        Schema::create('work_station_details', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(WorkStation::class)->constrained()->cascadeOnDelete();
            $table->string('job_desc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_station_details');
    }
};

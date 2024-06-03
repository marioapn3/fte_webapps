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
        Schema::create('w_l_a_detail_cycles', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(WorkStationDetail::class)->constrained()->cascadeOnDelete();
            $table->decimal('ws');
            $table->decimal('wb');
            $table->decimal('wn');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('w_l_a_detail_cycles');
    }
};

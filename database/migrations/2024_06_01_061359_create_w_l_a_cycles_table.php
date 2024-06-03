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
        Schema::create('w_l_a_cycles', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(WorkStation::class)->constrained()->cascadeOnDelete();
            $table->decimal('wla')->nullable();
            $table->decimal('wla_bulet')->nullable();
            $table->decimal('wb')->nullable();
            // satuan utput string
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('w_l_a_cycles');
    }
};

<?php

use App\Models\WorkElement;
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
        Schema::create('iterations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(WorkElement::class)->constrained()->cascadeOnDelete();
            $table->decimal('value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iterations');
    }
};

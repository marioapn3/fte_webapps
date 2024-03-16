<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class WorkElement extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'order'];

    /**
     * Get all of the comments for the WorkElement
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subWorkElements(): HasMany
    {
        return $this->hasMany(SubWorkElement::class, 'work_element_id', 'id');
    }

    public function standartTimeCalculations(): HasMany
    {
        return $this->hasMany(StandartTimeCalculation::class, 'work_element_id', 'id');
    }

    public function workerNeed(): HasOne
    {
        return $this->hasOne(WorkerNeed::class, 'work_element_id', 'id');
    }
}

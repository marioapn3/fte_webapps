<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailElement extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function subWorkElement()
    {
        return $this->belongsTo(SubWorkElement::class, 'sub_work_element_id', 'id');
    }

    public function standartTimeCalculations()
    {
        return $this->hasMany(StandartTimeCalculation::class, 'detail_element_id', 'id');
    }

    public function work_load()
    {
        return $this->hasOne(WorkLoad::class, 'detail_element_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkStationDetail extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function workStation()
    {
        return $this->belongsTo(WorkStation::class);
    }

    // has one rating factors each detail
    public function ratingFactor()
    {
        return $this->hasOne(RatingFactor::class);
    }

    // has one allowances
    public function allowance()
    {
        return $this->hasOne(Allowance::class);
    }

    // has one work element
    public function workElement()
    {
        return $this->hasOne(WorkElement::class);
    }

    // has one wla detail cycle
    public function wlaDetailCycle()
    {
        return $this->hasOne(WLADetailCycle::class);
    }
}

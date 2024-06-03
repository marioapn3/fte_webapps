<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatingFactor extends Model
{
    use HasFactory;


    protected $guarded = ['id'];

    public function rating()
    {
        return $this->belongsTo(RatingFactor::class);
    }
}

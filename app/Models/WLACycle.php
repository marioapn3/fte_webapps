<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WLACycle extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // beelongsto work stations
    public function workStation()
    {
        return $this->belongsTo(WorkStation::class);
    }
}

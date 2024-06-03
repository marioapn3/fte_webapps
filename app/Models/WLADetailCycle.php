<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WLADetailCycle extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // beelongsto work station detail
    public function workStationDetail()
    {
        return $this->belongsTo(WorkStationDetail::class);
    }
}

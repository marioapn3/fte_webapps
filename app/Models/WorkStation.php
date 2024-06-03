<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkStation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // hasMany
    public function workStationDetails()
    {
        return $this->hasMany(WorkStationDetail::class);
    }

    // has one wla cycle
    public function wlaCycle()
    {
        return $this->hasOne(WLACycle::class);
    }

    // has one absences
    public function absences()
    {
        return $this->hasOne(Absence::class);
    }
}

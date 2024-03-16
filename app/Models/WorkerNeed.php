<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkerNeed extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function workElement()
    {
        return $this->belongsTo(WorkElement::class, 'work_element_id', 'id');
    }
}

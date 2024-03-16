<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkLoad extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];


    public function detailElement()
    {
        return $this->belongsTo(DetailElement::class, 'detail_element_id', 'id');
    }
}

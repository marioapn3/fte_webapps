<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkElement extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // has many iteration
    public function iterations()
    {
        return $this->hasMany(Iteration::class);
    }
}

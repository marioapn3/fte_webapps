<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubWorkElement extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    /**
     * Get the work element that owns the SubWorkElement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function workElement(): BelongsTo
    {
        return $this->belongsTo(WorkElement::class, 'work_element_id', 'id');
    }

    public function detailElements(): HasMany
    {
        return $this->hasMany(DetailElement::class, 'sub_work_element_id', 'id');
    }

    /**
     * Get the user that owns the SubWorkElement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
}

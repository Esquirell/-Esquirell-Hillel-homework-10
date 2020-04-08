<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profit extends Model
{
    protected $fillable = [
        'sum',
        'source',
        'comment'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}

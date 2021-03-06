<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = [
        'name'
    ];

    public function profits(): HasMany
    {
        return $this->hasMany(Profit::class);
    }
    public function costs(): HasMany
    {
        return $this->hasMany(Cost::class);
    }

}

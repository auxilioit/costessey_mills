<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    /**
     * Get the locatin for the blog post.
     */
    public function reports(): HasMany
    {
        return $this->hasMany(Report::class);
    }
}

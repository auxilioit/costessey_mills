<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Report extends Model
{
    protected $fillable = [
        'location_id',
        'type',
        'reported_by',
    ];
    /**
     * Get the locatin for the blog post.
     */
    public function location(): hasOne
    {
        return $this->hasOne(Location::class);
    }
}

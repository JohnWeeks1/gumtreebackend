<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    /**
     * Get the ad for the picture.
     */
    public function ad()
    {
        return $this->belongsTo(Ad::class, 'ad_id', 'id');
    }
}

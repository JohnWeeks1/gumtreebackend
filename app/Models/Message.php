<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    /**
     * Get the message from the user_id.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the message from the seller_id.
     */
    public function seller()
    {
        return $this->hasOne(User::class, 'id', 'seller_id');
    }

    /**
     * Get the ad from the message.
     */
    public function ad()
    {
        return $this->hasOne(Ad::class, 'id', 'ad_id');
    }
}

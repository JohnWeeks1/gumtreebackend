<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    /**
     * Get the category associated with the sub_category.
     */
    public function category()
    {
        return $this->hasOne(Category::class);
    }
}

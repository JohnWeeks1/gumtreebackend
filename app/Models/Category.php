<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * Get the sub_categories for the category.
     */
    public function sub_categories()
    {
        return $this->hasMany(SubCategory::class);
    }
}

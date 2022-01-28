<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdsByCategory\AdsByCategoryIndex;
use App\Models\Ad;

class AdsByCategoryController extends Controller
{
    /**
     * Display ad by category.
     *
     * @param int $id
     *
     * @return AdsByCategoryIndex
     */
    public function index(int $id): AdsByCategoryIndex
    {
        $ads = Ad::where('category_id', '=', $id)
            ->with('images')
            ->orderBy('updated_at', 'desc')
            ->get();

        return new AdsByCategoryIndex($ads);
    }
}

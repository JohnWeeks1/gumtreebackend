<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdsByUserId\AdsByUserIdIndex;
use App\Models\Ad;

class AdsByUserIdController extends Controller
{
    /**
     * Display all Ads by user id.
     *
     * @param  int  $id
     *
     * @return AdsByUserIdIndex
     */
    public function index(int $id): AdsByUserIdIndex
    {
        $ads = Ad::where('user_id', '=', $id)
            ->with('images')
            ->orderBy('updated_at', 'desc')
            ->get();

        return new AdsByUserIdIndex($ads);
    }
}

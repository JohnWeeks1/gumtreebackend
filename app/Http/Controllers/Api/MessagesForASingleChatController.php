<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;

class MessagesForASingleChatController extends Controller
{
    /**
     * Get messages by multiple ids.
     *
     * @param int $user_id
     * @param int $seller_id
     * @param int $ad_id
     *
     * @return
     */
    public function index(int $user_id, int $seller_id, int $ad_id)
    {
        $message = Message::where('user_id', '=', $user_id)
            ->where('seller_id', '=', $seller_id)
            ->where('ad_id', '=', $ad_id)
            ->with('seller')
            ->with('user')
            ->with('ad')
            ->get();

        return response()->json($message, 200);
    }
}

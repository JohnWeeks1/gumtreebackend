<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Message\MessageIndex;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageGroupsByUserIdController extends Controller
{
    /**
     * Group all messages by ids and distinct
     *
     * @param Request $request
     *
     * @return MessageIndex
     */
    public function index(Request $request): MessageIndex
    {
        $messagesGrouped = Message::with('ad.images')
        ->where('messages.user_id', '=', $request->id)
        ->orWhere('messages.seller_id', '=', $request->id)
        ->distinct()
        ->get(['user_id', 'seller_id', 'ad_id']);

        return new MessageIndex($messagesGrouped);
    }
}

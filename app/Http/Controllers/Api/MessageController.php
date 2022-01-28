<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\MessageReceived;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = new Message();

        $message->user_id = $request->userId;
        $message->seller_id = $request->sellerId;
        $message->ad_id = $request->adId;
        $message->message = $request->message;
        $message->message_sent_by = $request->messageSentBy;


        if ($message->save()) {

            $receiverEmailAddress = '';
            $savedMessage = Message::findOrFail($message->id);

            if ($request->messageSentBy === 'buyer') {
                $receiverEmailAddress = $savedMessage->user->email;
            }
            if ($request->messageSentBy === 'seller') {
                $receiverEmailAddress = $savedMessage->seller->email;
            }

            Mail::to($receiverEmailAddress)
                ->send(new MessageReceived($savedMessage));

            return response()->json($message, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}

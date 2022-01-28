<?php

namespace App\Http\Resources\Message;

use App\Models\Message;
use Illuminate\Http\Resources\Json\JsonResource;

class MessageIndex extends JsonResource
{
    /**
     * Remove default data wrapper.
     */
    public static $wrap = null;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->map(function (Message $message) {
            return [
                'user_id' => $message->user_id,
                'seller_id' => $message->seller_id,
                'ad_id' => $message->ad_id,
                'name' => $message->ad->name,
                'message' => $message->where('ad_id', $message->ad_id)->orderBy('created_at', 'desc')->first(),
                'price' => $message->ad->price,
                'image' => $message->ad->images->pluck('name')->first(),
                'created_at' => $message->where('ad_id', $message->ad_id)->pluck('created_at')->last()
            ];
        });
    }
}

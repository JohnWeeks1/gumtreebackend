<?php

namespace App\Http\Resources\Ad;

use App\Models\Ad;
use Illuminate\Http\Resources\Json\JsonResource;

class AdIndex extends JsonResource
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
        return $this->map(function (Ad $ad) {
            return [
                'id' => $ad->id,
                'user_id' => $ad->user_id,
                'category_id' => $ad->category_id,
                'sub_category_id' => $ad->sub_category_id,
                'name' => $ad->name,
                'description' => $ad->description,
                'price' => $ad->price,
                'created_at' => $ad->created_at,
                'updated_at' => $ad->updated_at,
                'image' => $ad->images->pluck('name')->first()
            ];
        });
    }
}

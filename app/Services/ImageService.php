<?php

namespace App\Services;

use App\Models\Ad;
use Illuminate\Http\Request;

class ImageService
{
    /**
     * Convert base64 image and save in public/images/...
     *
     * @param Request $request
     * @param Ad $ad
     *
     * @return array
     */
    private function addImagesToFolder(Request $request, Ad $ad, string $pathString): array
    {
        $image_name_and_type_array = [];
        $path = public_path()."/images/ad-id-" . $ad->id;
        if (!file_exists($path)) { mkdir($path); }

        foreach ($request->images as $image) {

            $image_parts = explode(";base64,", $image['image']);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $image_name_and_type = uniqid().'.'.$image_type;
            $file = $path.'/'.$image_name_and_type; //path location

            file_put_contents($file, $image_base64);
            $image_name_and_type_array[] = $image_name_and_type;
        }

        return $image_name_and_type_array;
    }
}

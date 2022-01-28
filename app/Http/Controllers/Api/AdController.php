<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ad\StoreAdRequest;
use App\Http\Requests\Ad\UpdateAdRequest;
use App\Http\Resources\Ad\AdIndex;
use App\Models\Ad;
use App\Models\Image;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class AdController extends Controller
{
    /**
     * Display all Ads.
     *
     * @return AdIndex
     */
    public function index(): AdIndex
    {
        $ads = Ad::with('images')
            ->orderBy('updated_at', 'desc')
            ->get();

        return new AdIndex($ads);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAdRequest $request
     *
     * @return Ad $ad
     */
    public function store(StoreAdRequest $request)
    {
        try {
            $ad = new Ad();

            $ad->user_id = $request->userId;
            $ad->category_id = $request->categoryId;
            $ad->sub_category_id = $request->subCategoryId;
            $ad->name = $request->name;
            $ad->description = $request->description;
            $ad->price = $request->price;
            $ad->location = $request->location['placeResultData']['formatted_address'];
            $ad->location_json_data = json_encode($request->location);

            $ad->save();

            $images_array = $this->addImagesToFolder(
                $request,
                public_path()."/images/ad-id-".$ad->id."/"
            );
            $this->saveImage($ad, $images_array);

        } catch (Exception $e) {
            return response($e->getMessage(), 500);
        }

        return response()->json($ad, 200);
    }

    /**
     * Get AD by id.
     *
     * @param int $id
     */
    public function show(int $id)
    {
        return response()->json(Ad::where('id', '=', $id)->with('images')->get(), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateAdRequest $request
     * @param  string $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdRequest $request, string $id)
    {
        $ad = Ad::where('id', '=', $id)->first();
        $new_images_array_base64 = [];

        foreach ($request->images as $new_image) {
            if (substr($new_image['image'], 0, 11) === 'data:image/') {
                $new_images_array_base64[] = $new_image['image'];
            }
        }

        $path = public_path()."/images/ad-id-".$id."/";

        if (!empty($new_images_array_base64)) {
            foreach ($new_images_array_base64 as $image) {
                $image_parts = explode(";base64,", $image);
                $image_type_aux = explode("image/", $image_parts[0]);
                $image_type = $image_type_aux[1];
                $image_base64 = base64_decode($image_parts[1]);
                $image_name_and_type = uniqid().'.'.$image_type;
                $file_to_add = $path.$image_name_and_type; //path location

                file_put_contents($file_to_add, $image_base64);
                $images_array[] = $image_name_and_type;
            }
        }

        $combine_old_images_and_new = [];

        foreach ($request->images as $image) {
            if (isset($image['ad_id'])) {
                $combine_old_images_and_new[] = [
                    'id' => $image['id'],
                    'ad_id' => $image['ad_id'],
                    'name' => $image['image']
                ];
            }
        }

        if (!empty($images_array)) {
            foreach ($images_array as $image) {
                $combine_old_images_and_new[] = [
                    'id' => null,
                    'ad_id' => $id,
                    'name' => $image
                ];
            }
        }

        // Delete all images by ad_id
        Image::where('ad_id', $id)->delete();

        // Insert images from frontend
        foreach($combine_old_images_and_new as $image) {
            Image::insert([
                'ad_id' => $image['ad_id'],
                'name' => $image['name'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        $files = scandir($path);

        // Get all files from folder
        foreach($files as $key => $file) {
            if ($file === "." || $file === "..") {
                unset($files[$key]);
            } else {
                $folder_images[] = $file;
            }
        }

        // Get all images from images table by ad_id
        foreach($ad->images as $image) {
            $db_images[] = $image['name'];
        }

        // Find images to be removed from folder
        $removed_images = array_diff($folder_images, $db_images);

        // Remove redundant files from folder
        foreach($removed_images as $removed_image) {
            foreach($files as $file) {
                if ($file === $removed_image) {
                    unlink($path.$file);
                }
            }
        }

        $ad->category_id = $request->categoryId;
        $ad->sub_category_id = $request->subCategoryId;
        $ad->name = $request->name;
        $ad->description = $request->description;
        $ad->price = $request->price;
        $ad->location = $request->location['placeResultData']['formatted_address'];
        $ad->location_json_data = json_encode($request->location);

        $ad->save();

        return response()->json($ad, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ad $ad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ad $ad)
    {
        //
    }

    /**
     * Convert base64 image and save in public/images/...
     *
     * @param Request $request
     * @param string $path
     *
     * @return array
     */
    private function addImagesToFolder(Request $request, string $path): array
    {
        $images_array = [];
        if (!file_exists($path)) { mkdir($path); }

        foreach ($request->images as $image) {

            $image_parts = explode(";base64,", $image['image']);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $image_name_and_type = uniqid().'.'.$image_type;
            $file = $path.$image_name_and_type; //path location

            file_put_contents($file, $image_base64);
            $images_array[] = $image_name_and_type;
        }

        return $images_array;
    }

    /**
     * Save images to DB
     *
     * @param   Ad     $ad
     * @param array $image_name_and_type_array
     *
     */
    private function saveImage(Ad $ad, array $images_array)
    {
        foreach($images_array as $img) {
            Image::insert([
                'ad_id' => $ad->id,
                'name' => $img,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

    }
}

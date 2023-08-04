<?php

namespace App\Http\Controllers\Backend;

use App\Models\ImageMedia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageUploadController extends Controller
{
    public function destroy(Request $request)
    {
        $imageID = $request->image_id;
        $id = $request->id;
        $modelName = $request->model;

        $imageMedia = ImageMedia::where('model_name', $modelName)->where('table_id', $id)->first();

        if (!empty($imageMedia->data)) {
            $updatedImages = [];
            $isVitrinDeleted = false;

            foreach ($imageMedia->data as $img) {
                if ($img['image_no'] == $imageID) {
                    if (!empty($img['image'])) {
                        dosyasil($img['image']);
                    }

                    if (!empty($img['thumbnail'])) {
                        dosyasil($img['thumbnail']);
                    }

                    if ($img['vitrin'] === 1) {
                        $isVitrinDeleted = true;
                    }
                } else {
                    $updatedImages[] = $img;
                }
            }

            if ($isVitrinDeleted && count($updatedImages) > 0) {
                $updatedImages[0]['vitrin'] = 1;
            }

            $imageMedia->update(['data' => $updatedImages]);
        }

        return response()->json(['error' => false, 'message' => 'Başarıyla Kaldırıldı']);
    }



    public function vitrin(Request $request) {
        $imageID = $request->image_id;
        $id = $request->id;
        $modelName = $request->model;

        $imageMedia = ImageMedia::where('model_name', $modelName)->where('table_id', $id)->first();

        if (!empty($imageMedia->data)) {
            $updatedImages = [];

            foreach ($imageMedia->data as $img) {
                $img['vitrin'] = $img['image_no'] == $imageID ? 1 : 0;
                $updatedImages[] = $img;
            }

            $imageMedia->update(['data' => $updatedImages]);
        }

        return response()->json(['error'=>false, 'message'=>'Başarıyla Vitrin Yapıldı']);
    }

}

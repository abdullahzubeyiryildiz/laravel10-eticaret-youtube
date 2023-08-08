<?php

namespace App\Http\Controllers\Backend;

use App\Models\ImageMedia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageSeoController extends Controller
{
    public function index() {
          $images = ImageMedia::pluck('data')->toArray();
        return view('backend.pages.imageseo.index',compact('images'));
    }

    public function update(Request $request) {
      $imageno = $request->id;
      $alt = $request->imageAlt;
      $images = ImageMedia::where('data','LIKE', '%'.$imageno.'%')
     ->first();

     $newArray = [];
       foreach ( $images->data as $img) {
            if($img['image_no'] == $imageno) {
                $img['alt'] =  $alt;
            }
            $newArray[] = $img;
       }


       $images->data = $newArray;
       $images->save();

       return response(['error'=>false,'message'=>'Başarıyla Alt Seo Güncellendi.']);
    }

      /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $imageno = $request->id;
         $images = ImageMedia::where('data','LIKE', '%'.$imageno.'%')
        ->first();

        $newArray = [];
        if (!empty($images->data)) {
            foreach ($images->data as $img) {
                if($img['image_no'] == $imageno) {
                    dosyasil($img['image']);
                    dosyasil($img['thumbnail']);
                }else {
                      $newArray[] = $img;
                }

            }

        }

        $images->data = $newArray;
        $images->save();

        return response(['error'=>false,'message'=>'Başarıyla Silindi.']);
    }
}

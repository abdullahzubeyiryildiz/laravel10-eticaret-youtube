<?php

namespace App\Http\Controllers\Backend;

use App\Models\SiteSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use ImageResize;
class SettingController extends Controller
{
   public function index() {
    $sets = SiteSetting::get();
    return view('backend.pages.setting.index',compact('sets'));
   }

   public function create() {
    return view('backend.pages.setting.edit');
   }

   public function store(Request $request) {
    $key = $request->name;

        SiteSetting::firstOrCreate([
            'name'=>$key,
        ],[
            'name'=>$key,
            'data'=>$request->data,
            'set_type'=>$request->set_type
        ]);

    return back()->withSuccess('Başarılı');
   }

   public function edit($id) {
    $setting = SiteSetting::where('id',$id)->first();
    return view('backend.pages.setting.edit',compact('setting'));
   }


   public function update(Request $request, $id) {
    $setting = SiteSetting::where('id',$id)->first();

    $key = $request->name;

    if($request->hasFile('data')) {
        dosyasil($setting->data);

        $image = $request->file('data');
        $dosyadi = time();
         $yukleKlasor = 'img/site/';

         klasorac($yukleKlasor);
        $resimurl = resimyukle($image,$dosyadi,$yukleKlasor);
    }


    if($request->set_type == 'file' || $request->set_type == 'image') {
        $dataItem = $resimurl ?? $setting->data;
    }else {
        $dataItem = $request->data ?? $setting->data;
    }

    $setting->update([
        'name'=>$key,
        'data'=> $dataItem,
        'set_type'=>$request->set_type
    ]);

    return back()->withSuccess('Başarıyla Güncellendi');
   }
}

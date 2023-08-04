<?php

namespace App\Http\Controllers\Backend;

use App\Models\Slider;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SLiderRequest;
use ImageResize;
class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $sliders = Slider::with('images')->get();
        return view('backend.pages.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.slider.edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SLiderRequest $request)
    {

           /* if($request->hasFile('image')) {
                $image = $request->file('image');
                $dosyadi = $request->name;
                $yukleKlasor = 'img/slider/';
                klasorac($yukleKlasor);
                $resimurl = resimyukle($image,$dosyadi,$yukleKlasor);
            } */


          $slider =  Slider::create([
                'name'=>$request->name,
                'link'=>$request->link,
                'content'=>$request->content,
                'status'=>$request->status,
                'image'=> $resimurl ?? NULL,
            ]);

            if ($request->hasFile('image')) {
                $this->fileSave('Slider', 'slider', $request, $slider);
            }


            return back()->withSuccess('Başarıyla Oluşturuldu!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $slider = Slider::where('id',$id)->first();
        return view('backend.pages.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $slider = Slider::where('id',$id)->firstOrFail();

       /* if($request->hasFile('image')) {
            dosyasil($slider->image);

            $image = $request->file('image');
            $dosyadi = $request->name;
            $yukleKlasor = 'img/slider/';
            klasorac($yukleKlasor);
            $resimurl = resimyukle($image,$dosyadi,$yukleKlasor);
        } */

        $slider->update([
            'name'=>$request->name,
            'link'=>$request->link,
            'content'=>$request->content,
            'status'=>$request->status,
            'image'=> $resimurl ?? $slider->image,
        ]);


        if ($request->hasFile('image')) {
            $this->fileSave('Slider', 'slider', $request, $slider);
        }


        return back()->withSuccess('Başarıyla Güncellendi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {

        $slider = Slider::where('id',$request->id)->firstOrFail();

        dosyasil($slider->image);
        $slider->delete();
        return response(['error'=>false,'message'=>'Başarıyla Silindi.']);
    }

    public function status(Request $request) {

        $update = $request->statu;
        $updatecheck = $update == "false" ? '0' : '1';

        Slider::where('id',$request->id)->update(['status'=> $updatecheck]);
        return response(['error'=>false,'status'=>$update]);
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
          $categories = Category::with('category:id,cat_ust,name')->get();
        return view('backend.pages.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('backend.pages.category.edit',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {

           $category = Category::create([
                'name'=>$request->name,
                'cat_ust'=>$request->cat_ust,
                'status'=>$request->status,
                'content'=>$request->content,
                'image'=> $resimurl ?? NULL,
            ]);


            if ($request->hasFile('image')) {
                $this->fileSave('Category', 'kategori', $request, $category);
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
         $category = Category::where('id',$id)->with('images')->first();


        $categories = Category::get();
        return view('backend.pages.category.edit',compact('category','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $category = Category::where('id',$id)->firstOrFail();

       /* if($request->hasFile('image')) {
            dosyasil($category->image);

            $image = $request->file('image');
            $dosyadi = $request->name;
            $yukleKlasor = 'img/kategori/';
            $resimurl = resimyukle($image,$dosyadi,$yukleKlasor);
        } */

        $category->update([
            'name'=>$request->name,
            'cat_ust'=>$request->cat_ust,
            'status'=>$request->status,
            'content'=>$request->content,
            'image'=>$resimurl ?? $category->image,
        ]);


        if ($request->hasFile('image')) {
            $this->fileSave('Category', 'kategori', $request, $category);
        }

        return back()->withSuccess('Başarıyla Güncellendi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {

        $category = Category::where('id',$request->id)->firstOrFail();

        dosyasil($category->image);
        $category->delete();
        return response(['error'=>false,'message'=>'Başarıyla Silindi.']);
    }

    public function status(Request $request) {

        $update = $request->statu;
        $updatecheck = $update == "false" ? '0' : '1';

        Category::where('id',$request->id)->update(['status'=> $updatecheck]);
        return response(['error'=>false,'status'=>$update]);
    }
}

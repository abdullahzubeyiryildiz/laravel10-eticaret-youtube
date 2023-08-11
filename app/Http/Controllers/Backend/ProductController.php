<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use App\Models\Category;
use App\Models\ImageMedia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
          $products = Product::with('category:id,cat_ust,name')->with('images')->orderBy('id','desc')->paginate(20);
        return view('backend.pages.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('backend.pages.product.edit',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {


           $product = Product::create([
                'name'=>$request->name,
                'category_id'=>$request->category_id,
                'content'=>$request->content,
                'short_text'=>$request->short_text,
                'price'=>$request->price,
                'size'=>$request->size,
                'color'=>$request->color,
                'qty'=>$request->qty,
                'kdv'=>$request->kdv,
                'title'=>$request->title,
                'description'=>$request->description,
                'keywords'=>$request->keywords,
                'status'=>$request->status,
            ]);



            if ($request->hasFile('image')) {
                $this->fileSave('Product', 'urun', $request, $product);
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
         $product = Product::where('id',$id)->with('images')->first();


        $categories = Category::get();
        return view('backend.pages.product.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {

        $product = Product::where('id',$id)->firstOrFail();

      /*  if($request->hasFile('image')) {
            dosyasil($product->image);

            $image = $request->file('image');
            $dosyadi = $request->name;
            $yukleKlasor = 'img/urun/';
            klasorac($yukleKlasor);
            $resimurl = resimyukle($image,$dosyadi,$yukleKlasor);
        } */

        $product->update([
            'name'=>$request->name,
            'category_id'=>$request->category_id,
            'content'=>$request->content,
            'short_text'=>$request->short_text,
            'price'=>$request->price,
            'size'=>$request->size,
            'color'=>$request->color,
            'qty'=>$request->qty,
            'kdv'=>$request->kdv,
            'title'=>$request->title,
            'description'=>$request->description,
            'keywords'=>$request->keywords,
            'status'=>$request->status,
        ]);


        if ($request->hasFile('image')) {
            $this->fileSave('Product', 'urun', $request, $product);
        }

        return back()->withSuccess('Başarıyla Güncellendi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {

        $product = Product::where('id',$request->id)->firstOrFail();

        $imageMedia = ImageMedia::where('model_name', 'Product')->where('table_id', $product->id)->first();

        if (!empty($imageMedia->data)) {
            foreach ($imageMedia->data as $img) {
                dosyasil($img['image']);
            }
            $imageMedia->delete();
        }


        $product->delete();
        return response(['error'=>false,'message'=>'Başarıyla Silindi.']);
    }

    public function status(Request $request) {

        $update = $request->statu;
        $updatecheck = $update == "false" ? '0' : '1';

        Product::where('id',$request->id)->update(['status'=> $updatecheck]);
        return response(['error'=>false,'status'=>$update]);
    }
}

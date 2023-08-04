<?php

namespace App\Http\Controllers\Frontend;

use App\Models\About;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageHomeController extends Controller
{
   public function anasayfa() {

           $slider = Slider::where('status','1')->first();
          $title = "Anasayfa";
         $about = About::where('id',1)->first();

         $lastproducts = Product::where('status','1')
         ->select(['id','name','slug','size','color','price','category_id','image'])
         ->with('category')
         ->orderBy('id','desc')
         ->limit(10)
         ->get();


         $seolists = metaolustur('anasayfa');

         $seo = [
             'title' =>  $seolists['title'] ?? '',
             'description' => $seolists['description'] ?? '',
             'keywords' => $seolists['keywords'] ?? '',
             'image' => asset('img/page-bg.jpg'),
             'url'=>  $seolists['currenturl'],
             'canonical'=> $seolists['trpage'],
             'robots' => 'index, follow',
         ];



        return view('frontend.pages.index',compact('seo','slider','title','about','lastproducts'));
   }
}

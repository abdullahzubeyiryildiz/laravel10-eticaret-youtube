<?php

namespace App\Http\Controllers\Backend;

use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons = Coupon::get();
        return view('backend.pages.coupons.index',compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.coupons.edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = $request->name;
        $sor = Coupon::where('name',$name)->first();
            if(!empty($sor)) {
                return back()->withError('Zaten Kayıtlı!');
            }

          $coupon =  Coupon::create([
                'name'=>$request->name,
                'price'=>$request->price,
                'discount_rate'=>$request->discount_rate,
                'status'=>$request->status,
            ]);

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
         $coupon = Coupon::where('id',$id)->first();
        return view('backend.pages.coupons.edit',compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $name = $request->name;
        $sor = Coupon::where('id','!=',$id)->where('name',$name)->first();
        if(!empty($sor)) {
            return back()->withError('Zaten Kayıtlı!');
        }

        $coupon = Coupon::where('id',$id)->firstOrFail();

        $coupon->update([
            'name'=>$request->name,
             'price'=>$request->price,
            'discount_rate'=>$request->discount_rate,
            'status'=>$request->status,
        ]);

        return back()->withSuccess('Başarıyla Güncellendi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {

        $coupon = Coupon::where('id',$request->id)->firstOrFail();

        $coupon->delete();
        return response(['error'=>false,'message'=>'Başarıyla Silindi.']);
    }

    public function status(Request $request) {

        $update = $request->statu;
        $updatecheck = $update == "false" ? '0' : '1';

        Coupon::where('id',$request->id)->update(['status'=> $updatecheck]);
        return response(['error'=>false,'status'=>$update]);
    }
}

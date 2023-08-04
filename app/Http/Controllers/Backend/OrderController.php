<?php

namespace App\Http\Controllers\Backend;

use App\Models\Order;
use App\Models\Contact;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
  public function index () {
     $orders = Invoice::withCount('orders')->paginate(20);
    return view('backend.pages.order.index',compact('orders'));
  }

  public function edit($id) {
    $invoice = Invoice::where('id',$id)->with('orders')->firstOrFail();
    return view('backend.pages.order.edit',compact('invoice'));
  }

  public function update(Request $request, $id) {

  }

  public function destroy(Request $request)
  {
      $order = Invoice::where('id',$request->id)->firstOrFail();
      Order::where('order_no',$order->order_no)->delete();
      $order->delete();
      return response(['error'=>false,'message'=>'Başarıyla Silindi.']);
  }

  public function status(Request $request) {
      $update = $request->statu;
      $updatecheck = $update == "false" ? '0' : '1';
      Invoice::where('id',$request->id)->update(['status'=> $updatecheck]);
      return response(['error'=>false,'status'=>$update]);
  }
}

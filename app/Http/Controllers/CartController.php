<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Coupon;
use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index() {

        $cartItem = $this->sepetList();

        return view('frontend.pages.cart',compact('cartItem'));
    }

    public function sepetList() {
        $cartItem = session()->get('cart') ?? [];
        $totalPrice = 0;
        foreach ($cartItem as $cart) {
            $kdvOrani = $cart['kdv'] ?? 0;
            $kdvtutar = ($cart['price'] * $cart['qty']) * ($kdvOrani / 100);
            $toplamTutar = $cart['price'] * $cart['qty'] + $kdvtutar;
            $totalPrice +=  $toplamTutar;
        }
        if (session()->get('coupon_code') && $totalPrice != 0) {
            $kupon = Coupon::where('name',session()->get('coupon_code'))->where('status','1')->first();
            $kuponprice = $kupon->price ?? 0;
            $newtotalPrice = $totalPrice - $kuponprice;
        }else {
            $newtotalPrice = $totalPrice;
        }

        session()->put('total_price',$newtotalPrice);

        if(count(session()->get('cart')) == 0) {
            session()->forget('coupon_code');
        }

        return  $cartItem;
    }


    public function sepetform() {

        $cartItem = $this->sepetList();

        return view('frontend.pages.cartform',compact('cartItem'));
    }


    public function add(Request $request) {
            $productID= sifrelecoz($request->product_id);
            $qty= $request->qty ?? 1;
            $size= $request->size;
             $urun = Product::find($productID);
            if(!$urun) {
                return back()->withError('Ürün Bulanamadı!');
            }
            $cartItem = session('cart',[]);

            if(array_key_exists($productID,$cartItem)){
                $cartItem[$productID]['qty'] += $qty;
            }else{
                $cartItem[$productID]=[
                    'image'=>$urun->image,
                    'name'=>$urun->name,
                    'price'=>$urun->price,
                    'qty'=>$qty,
                    'kdv'=>$urun->kdv,
                    'size'=>$size,
                ];
            }
            session(['cart'=>$cartItem]);

            if($request->ajax()) {
                return response()->json(['sepetCount'=>count(session()->get('cart')), 'message'=>'Ürün Sepete Eklendi!']);
            }

           return back()->withSuccess('Ürün Sepete Eklendi!');
    }

    public function newqty(Request $request) {
        $productID= $request->product_id;
        $qty= $request->qty ?? 1;
        $itemtotal = 0;
         $urun = Product::find($productID);
        if(!$urun) {
            return response()->json('Ürün Bulanamadı!');
        }
        $cartItem = session('cart',[]);

        if(array_key_exists($productID,$cartItem)){
            $cartItem[$productID]['qty'] = $qty;
            if($qty == 0 || $qty < 0){
                unset($cartItem[$productID]);
            }

             $kdvOraniitem = $urun->kdv ?? 0;
             $kdvtutaritem = ($urun->price * $qty) * ($kdvOraniitem / 100);
            $itemtotal = $urun->price * $qty + $kdvtutaritem;

        }

        session(['cart'=>$cartItem]);


         $this->sepetList();

        if($request->ajax()) {
            return response()->json(['itemTotal'=>$itemtotal, 'totalPrice'=>session()->get('total_price'), 'message'=>'Sepet Güncellendi']);
        }
    }


    public function remove(Request $request) {

        $productID= sifrelecoz($request->product_id);
        $cartItem = session('cart',[]);
        if(array_key_exists($productID,$cartItem)) {
            unset($cartItem[$productID]);
        }
        session(['cart'=>$cartItem]);

        if(count(session()->get('cart')) == 0) {
            session()->forget('coupon_code');
        }

        if($request->ajax()) {
            return response()->json(['sepetCount'=>count(session()->get('cart')), 'message'=>'Ürün Sepetten Kaldırıldı!']);
        }

        return back()->withSuccess('Başarıyla Sepetten Kaldırıldı!');
    }


    public function couponcheck(Request $request) {

             $kupon = Coupon::where('name',$request->coupon_name)->where('status','1')->first();

             if(empty($kupon)) {
                return back()->withError('Kupon Bulunamadı!');
             }
             $kuponcode = $kupon->name ?? '';
            session()->put('coupon_code',$kuponcode);

             $kuponprice = $kupon->price ?? 0;
             session()->put('coupon_price',$kuponprice);

             $this->sepetList();

             return back()->withSuccess('Kupon Uygulandı!');
    }



    function generateKod() {
        $siparisno = generateOTP(7);
            if ($this->barcodeKodExists($siparisno)) {
                return $this->generateKod();
            }

            return $siparisno;
        }

        function barcodeKodExists($siparisno) {
            return Invoice::where('order_no',$siparisno)->exists();
        }


    public function cartSave(Request $request) {
            $request->validate([
                'name' => 'required|string|min:3',
                'email' => 'required|email',
                'phone' => 'required|string',
                'company_name' => 'nullable|string',
                'address' => 'required|string',
                'country' => 'required|string',
                'city' => 'required|string',
                'district' => 'required|string',
                'zip_code' => 'required|string',
                'note' => 'nullable|string',
            ],[
                'name.required' => __('İsim alanı zorunludur.'),
                'name.string' => __('İsim bir metin olmalıdır.'),
                'name.min' => __('İsim en az 3 karakterden oluşmalıdır.'),
                'email.required' => __('E-posta alanı zorunludur.'),
                'email.email' => __('Geçerli bir e-posta adresi girilmelidir.'),
                'phone.required' => __('Telefon alanı zorunludur.'),
                'phone.string' => __('Telefon bir metin olmalıdır.'),
                'company_name.string' => __('Şirket adı bir metin olmalıdır.'),
                'address.required' => __('Adres alanı zorunludur.'),
                'address.string' => __('Adres bir metin olmalıdır.'),
                'country.required' => __('Ülke alanı zorunludur.'),
                'country.string' => __('Ülke bir metin olmalıdır.'),
                'city.required' => __('Şehir alanı zorunludur.'),
                'city.string' => __('Şehir bir metin olmalıdır.'),
                'district.required' => __('İlçe alanı zorunludur.'),
                'district.string' => __('İlçe bir metin olmalıdır.'),
                'zip_code.required' => __('Posta kodu alanı zorunludur.'),
                'zip_code.string' => __('Posta kodu bir metin olmalıdır.'),
                'note.string' => __('Not bir metin olmalıdır.'),
            ]);

           $invoce = Invoice::create([
                "user_id"=> auth()->user()->id ?? null,
                "order_no"=> $this->generateKod(),
                "country"=> $request->country,
                "name"=> $request->name,
                "company_name"=> $request->company_name ?? null,
                "address"=> $request->address ?? null,
                "city"=> $request->city ?? null,
                "district"=> $request->district ?? null,
                "zip_code"=> $request->zip_code ?? null,
                "email"=> $request->email ?? null,
                "phone"=> $request->phone ?? null,
                "note"=> $request->note ?? null,
            ]);


            $cart = session()->get('cart') ?? [];
            foreach ( $cart as $key => $item) {
                Order::create([
                    'order_no'=> $invoce->order_no,
                    'product_id'=>$key,
                    'name'=>$item['name'],
                    'price'=>$item['price'],
                    'qty'=>$item['qty'],
                    'kdv'=>$item['kdv']
                ]);
            }

            session()->forget('cart');
            return redirect()->route('anasayfa')->withSuccess('Alışveriş Başarıyla Tamamlandı.');

    }

}

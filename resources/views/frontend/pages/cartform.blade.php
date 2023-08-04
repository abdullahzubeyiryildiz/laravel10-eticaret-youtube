@extends('frontend.layout.layout')

@section('content')
@include('frontend.inc.breadcrumb')

<div class="site-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-12">
          <div class="border p-4 rounded" role="alert">
            Returning customer? <a href="#">Click here</a> to login
          </div>
        </div>
      </div>
      <form action="{{route('sepet.cartSave')}}" method="POST">
        @csrf

      <div class="row">
        <div class="col-md-6 mb-5 mb-md-0">
          <h2 class="h3 mb-3 text-black">Billing Details</h2>

          <div class="p-3 p-lg-5 border">
            <div class="form-group">
              <label for="c_country" class="text-black">Ülke <span class="text-danger">*</span></label>

              <select id="c_country" name="country" class="form-control">
                <option value="">Ülke Seçiniz</option>
                <option value="Turkey" selected>Türkiye</option>
              </select>
            </div>
            <div class="form-group row">
              <div class="col-md-12">
                <label for="c_fname" class="text-black">Ad Soyad <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="c_fname" name="name">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-12">
                <label for="c_companyname" class="text-black">Şirket Adı </label>
                <input type="text" class="form-control" id="c_companyname" name="company_name">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-12">
                <label for="c_address" class="text-black">Address <span class="text-danger">*</span></label>
                <textarea type="text" class="form-control" id="c_address" name="address" placeholder="Adress" rows="2"> </textarea>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-6">
                <label for="c_state_country" class="text-black">Şehir <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="c_state_country" name="city">
              </div>
              <div class="col-md-6">
                <label for="c_state_country" class="text-black">İlçe<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="c_state_country" name="district">
              </div>
              <div class="col-md-12">
                <label for="c_postal_zip" class="text-black">Posta Kdu <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="c_postal_zip" name="zip_code">
              </div>
            </div>

            <div class="form-group row mb-5">
              <div class="col-md-6">
                <label for="c_email_address" class="text-black">E-Posta <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="c_email_address" name="email">
              </div>
              <div class="col-md-6">
                <label for="c_phone" class="text-black">Telefon <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="c_phone" name="phone" placeholder="Phone Number">
              </div>
            </div>

            <div class="form-group">
              <label for="c_order_notes" class="text-black">Sipariş Notu</label>
              <textarea name="note" id="c_order_notes" cols="30" rows="5" class="form-control" placeholder="Sipariş Notu."></textarea>
            </div>

          </div>

        </div>
        <div class="col-md-6">

          <div class="row mb-5">
            <div class="col-md-12">
              <h2 class="h3 mb-3 text-black">İndirim Kuponu</h2>
              <div class="p-3 p-lg-5 border">

                <label for="c_code" class="text-black mb-3">Kopon Kodu</label>
                <div class="input-group w-75">
                  <input type="text" readonly class="form-control" value="{{session()->get('coupon_code') ?? ''}}" id="c_code" placeholder="Kupon Kod" aria-label="Coupon Code" aria-describedby="button-addon2">

                </div>

              </div>
            </div>
          </div>

          <div class="row mb-5">
            <div class="col-md-12">
              <h2 class="h3 mb-3 text-black">Sipariş Detayı</h2>
              <div class="p-3 p-lg-5 border">
                <table class="table site-block-order-table mb-5">
                  <thead>
                    <th>Product</th>
                    <th>Total</th>
                  </thead>
                  <tbody>

                    @if (session()->get('cart'))
                    @foreach (session()->get('cart') as $key => $cart)
                    @php
                        $kdvOrani = $cart['kdv'] ?? 0;
                        $fiyat = $cart['price'];
                        $adet = $cart['qty'];

                        $kdvtutar = ($fiyat * $adet) * ($kdvOrani / 100);
                        $toplamTutar = $fiyat * $adet + $kdvtutar;
                    @endphp

                        <tr>
                            <td>{{$cart['name']}}<strong class="mx-2">x</strong> ({{$cart['qty']}})</td>
                            <td>{{$toplamTutar}} ₺</td>
                        </tr>
                        @endforeach
                    @endif
                    <tr>
                        <td class="text-black font-weight-bold"><strong>İndirim</strong></td>
                        <td class="text-black font-weight-bold"><strong>{{session()->get('coupon_price') ?? 0}} ₺</strong></td>
                      </tr>
                    <tr>
                      <td class="text-black font-weight-bold"><strong>Toplam Tutar</strong></td>
                      <td class="text-black font-weight-bold"><strong>{{session()->get('total_price') ?? 0}} ₺</strong></td>
                    </tr>
                  </tbody>
                </table>


                <div class="form-group">
                  <button class="btn btn-primary btn-lg py-3 btn-block">Satın Al</button>
                </div>

              </div>
            </div>
          </div>

        </div>
      </div>
    </form>

      <!-- </form> -->
    </div>
  </div>
@endsection

@section('customjs')

@endsection

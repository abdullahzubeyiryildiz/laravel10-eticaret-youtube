@extends('backend.layout.app')
@section('customcss')
<style>
  body {
  width: 100%;
  height: 100%;
  margin: 0;
  padding: 0;
  background-color: #fafafa;
  font-family: system-ui;
}

* {
  box-sizing: border-box;
  -moz-box-sizing: border-box;
}

.page {
  width: 210mm;
  min-height: 297mm;
  padding: 20mm;
  margin: 10mm auto;
  border: 1px #d3d3d3 solid;
  border-radius: 5px;
  background: white;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

@page {
  size: A4;
  margin: 0;
}

@media print {
  html,
  body {
    width: 210mm;
    height: 297mm;
  }

  .page {
    margin: 0;
    border: initial;
    border-radius: initial;
    width: initial;
    min-height: initial;
    box-shadow: initial;
    background: initial;
    page-break-after: always;
  }
}

.center {
  text-align: center;
}

h2 {
  font-size: 36px;
  font-weight: 500;
}

.header-img {
  width: 100px;
  height: 100px;
}

.invoice {
  display: flex;
  justify-content: space-between;
}

.invoice-header {
  font-size: 24px;
}

.font-size-14 {
  font-size: 14px;
  line-height: 4px;
}

.bold-text {
  font-weight: 800;
}

table.unstyledTable {
  width: 100%;
}

table {
  border-collapse: collapse;
  border-spacing: 0 5px;
  table-layout: fixed;
}

thead tr th {
  border-bottom: 2px solid #DCDCDC;
  font-weight: 800;
}

tbody tr {
  border-bottom: 1px solid #DCDCDC;
  text-align: end;
}

tbody tr td {
  padding: 8px;
}

.last-row{
  border: 0;
}

.footer {
  text-align: end;
}

.font-weight-400{
  font-weight: 400;
}
</style>

@endsection
@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Sipariş</h4>

                @if ($errors)
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{$error}}
                    </div>
                    @endforeach
                @endif
                @if (session()->get('success'))
                <div class="alert alert-success">
                    {{session()->get('success')}}
                </div>
                @endif
              </div>







              <div class="page">
                <div class="subpage">
                  <div class="header center"><img class="header-img" src="{{asset($settings['logo'])}}" />
                    <h2 class="font-weight-400" >{{$invoice->name ?? ''}}</h2>
                  </div>

                  <div class="invoice">
                    <div class="invoce-from">
                      <p class="invoice-header">Sipariş No</p>
                      <div class="font-size-14">
                        <p>{{$invoice->order_no ?? ''}}</p>
                      </div>
                    </div>
                    <div class="font-size-14">
                      <p class="bold-text">Sipariş Tarihi:
                        {{isset($invoice->created_at) ? Carbon::parse($invoice->created_at)->format('d.m.Y H:i') : ''}}</p>
                      <p>Güncelleme Saati:  {{isset($invoice->updated_at) ? Carbon::parse($invoice->updated_at)->format('d.m.Y H:i') : ''}}</p>
                    </div>
                  </div>



                  <div class="invoice">
                    <div class="invoce-from">
                      <div class="font-size-14">
                      </div>
                    </div>
                    <div class="font-size-14">
                        <p>{{$invoice->email}}</p>
                        <p>{{$invoice->phone ?? ''}}</p>
                        <p>{{$invoice->address}}</p>
                    </div>
                  </div>
                </div>

                <div class="content">
                  <h2 class="center font-weight-400">Fatura Bilgileri</h2>
                  <p class="font-size-14">{{$invoice->company_name}}</p>
                  <p class="font-size-14">{{$invoice->country}}</p>
                  <p class="font-size-14">{{$invoice->city}}</p>
                  <p class="font-size-14">{{$invoice->district}}</p>
                  <p class="font-size-14">{{$invoice->note}}</p>

                  <table class="unstyledTable">
                    <thead>
                      <tr>
                        <th>Ürün Adı</th>
                        <th>Adet</th>
                        <th>fİYAT</th>
                        <th>kdv</th>
                        <th>Toplam Tutar</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $alltotal = 0;
                        @endphp
                        @if (!empty($invoice->orders))
                            @foreach ($invoice->orders as $item)
                            @php
                            $kdvOrani = $item['kdv'] ?? 0;
                            $fiyat = $item['price'];
                            $adet = $item['qty'];

                            $kdvtutar = ($fiyat * $adet) * ($kdvOrani / 100);
                            $toplamTutar = $fiyat * $adet + $kdvtutar;
                        @endphp
                                <tr>
                                    <td>{{$item['name']}}</td>
                                    <td>{{$item['qty']}}</td>
                                    <td>{{$item['price']}}</td>
                                    <td>{{$item['kdv']}}</td>
                                    <td>{{$toplamTutar}}</td>
                                    @php
                                        $alltotal += $toplamTutar
                                    @endphp
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                    </tr>
                  </table>

                <div class="footer"><h2 class="font-weight-400">Toplam : {{$alltotal}} ₺<h2></div>
                </div>
              </div>









            </div>
          </div>
    </div>
@endsection

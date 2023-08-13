@extends('backend.layout.app')

@section('content')


    <div class="row">
      <div class="col-md-12 grid-margin transparent">
        <div class="row">
          <div class="col-md-6 mb-4 stretch-card transparent">
            <div class="card card-tale">
              <div class="card-body">
                <p class="mb-4">Sipariş Aylık Sayısı</p>
                <p class="fs-30 mb-2">{{$mountTotalCount}}</p>
                <p>Bu Ayki Sipariş Sayısı</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-4 stretch-card transparent">
            <div class="card card-dark-blue">
              <div class="card-body">
                <p class="mb-4">Sipariş Aylık Kazanç</p>
                <p class="fs-30 mb-2">{{$mountTotalPrice}}</p>
                <p>Bu Ayki Sipariş Kazanç Sayısı</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
            <div class="card card-light-blue">
              <div class="card-body">
                <p class="mb-4">Sipariş Sayısı</p>
                <p class="fs-30 mb-2">{{$TotalCount}}</p>
                <p>Tüm Sipariş Sayısı</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 stretch-card transparent">
            <div class="card card-light-danger">
              <div class="card-body">
                <p class="mb-4">Sipariş Kazanç</p>
                <p class="fs-30 mb-2">{{$TotalPrice}}</p>
                <p>Tüm Sipariş Kazanç</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
   {{-- <div class="row">
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title">Order Details</p>
            <p class="font-weight-500">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p>
            <div class="d-flex flex-wrap mb-5">
              <div class="mr-5 mt-3">
                <p class="text-muted">Order value</p>
                <h3 class="text-primary fs-30 font-weight-medium">12.3k</h3>
              </div>
              <div class="mr-5 mt-3">
                <p class="text-muted">Orders</p>
                <h3 class="text-primary fs-30 font-weight-medium">14k</h3>
              </div>
              <div class="mr-5 mt-3">
                <p class="text-muted">Users</p>
                <h3 class="text-primary fs-30 font-weight-medium">71.56%</h3>
              </div>
              <div class="mt-3">
                <p class="text-muted">Downloads</p>
                <h3 class="text-primary fs-30 font-weight-medium">34040</h3>
              </div>
            </div>
            <canvas id="order-chart"></canvas>
          </div>
        </div>
      </div>
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
           <div class="d-flex justify-content-between">
            <p class="card-title">Sales Report</p>
            <a href="#" class="text-info">View all</a>
           </div>
            <p class="font-weight-500">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p>
            <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
            <canvas id="sales-chart"></canvas>
          </div>
        </div>
      </div>
    </div> --}}

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <p class="card-title mb-0">En çok Sipariş Verilen Ürünler</p>
              <div class="table-responsive">
                <table class="table table-striped table-borderless">
                  <thead>
                    <tr>
                      <th>Ürün Adı</th>
                      <th>Toplam Satış</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if (!empty($topProducts) && $topProducts->count() > 0)
                        @foreach ($topProducts as $top)
                        <tr>

                            @php
                            $images = collect($top->product->images->data ?? '');
                            @endphp

                            <td><img src="{{asset($images->sortByDesc('vitrin')->first()['image'] ?? 'img/resimyok.png')}}" ></img></td>
                            <td>{{$top->product->name}}</td>
                            <td class="font-weight-bold">{{$top->total_sold}}</td>
                          </tr>
                        @endforeach
                    @endif
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

      </div>
@endsection

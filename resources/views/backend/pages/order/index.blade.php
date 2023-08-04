@extends('backend.layout.app')

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Basic Table</h4>

            @if (session()->get('success'))
                <div class="alert alert-success">
                    {{session()->get('success')}}
                </div>
                @endif


          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Ad Soyad</th>
                  <th>Email</th>
                  <th>Telefon</th>
                  <th>Adres</th>
                  <th>Durum</th>
                  <th>Sepet Ürün Sayısı</th>
                  <th>Edit</th>
                </tr>
              </thead>
              <tbody>
                @if (!empty($orders) && $orders->count() > 0)
                    @foreach ($orders as $order)
                    <tr class="item" item-id="{{ $order->id }}">
                        <td>{{$order->name}}</td>
                        <td>{{$order->email ?? ''}}</td>
                        <td>{{$order->phone}}</td>
                        <td>{!! strLimit($order->address,150,route('panel.order.edit',$order->id)) !!}</td>
                        <td>
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" class="durum" data-on="Aktif" value="1" data-off="Pasif" data-onstyle="success" data-offstyle="danger" {{ $order->status == '1' ? 'checked' : '' }}  data-toggle="toggle">
                            </label>
                          </div>
                        </td>
                        <td>{{$order->orders_count}}</td>
                        <td class="d-flex">
                            <a href="{{route('panel.order.edit',$order->id)}}" class="btn btn-primary mr-2">Düzenle</a>

                            <button type="button" class="silBtn btn btn-danger">Sil</button>
                        </td>
                      </tr>

                    @endforeach
                @endif

              </tbody>
            </table>
          </div>

          <div class="row">
            <div class="col-lg-12">
                {{$orders->links('pagination::custom')}}
            </div>

          </div>
        </div>
      </div>
    </div>



  </div>
@endsection

@section('customjs')
<script>

    $(document).on('change', '.durum', function(e) {

            id = $(this).closest('.item').attr('item-id');
            statu = $(this).prop('checked');
            $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:"POST",
            url:"{{route('panel.order.status')}}",
            data:{
                id:id,
                statu:statu
            },
            success: function (response) {
                if (response.status == "true")
                {
                    alertify.success("Durum Aktif Edildi");
                } else {
                    alertify.error("Durum Pasif Edildi");
                }
            }
        });
    });


        $(document).on('click', '.silBtn', function(e) {
            e.preventDefault();
                var item = $(this).closest('.item');
                 id = item.attr('item-id');
                alertify.confirm("Silmek İstediğine Eminmisin?","Silmek İstediğine Eminmisin?",
                    function(){

                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type:"DELETE",
                            url:"{{route('panel.order.destroy')}}",
                            data:{
                                id:id,
                            },
                            success: function (response) {
                                if (response.error == false)
                                {
                                    item.remove();
                                    alertify.success(response.message);
                                }else {
                                    alertify.error("Bir Hata Oluştu");
                                }
                            }
                        });
                    },
                    function(){
                        alertify.error('Silme İptal Edildi');
                    });
        });

</script>
@endsection

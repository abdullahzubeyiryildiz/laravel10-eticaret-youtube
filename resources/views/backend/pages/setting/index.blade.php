@extends('backend.layout.app')

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Site Ayarları</h4>
          <p class="card-description">
            <a href="{{route('panel.setting.create')}}" class="btn btn-primary">Yeni</a>
          </p>

            @if (session()->get('success'))
                <div class="alert alert-success">
                    {{session()->get('success')}}
                </div>
                @endif


          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Resim</th>
                  <th>Key</th>
                  <th>Value</th>
                  <th>Edit</th>
                </tr>
              </thead>
              <tbody>
                @if (!empty($settings) && $settings->count() > 0)
                    @foreach ($settings as $setting)
                    <tr class="item" item-id="{{ $setting->id }}">

                        <td class="py-1">
                            @if ($setting->set_type == 'image')
                                 <img src="{{asset($setting->data)}}" alt="image"/>
                            @endif
                        </td>
                        <td>{{$setting->name}}</td>
                        <td>{{$setting->data ?? ''}}</td>
                        <td>{{$setting->set_type}}</td>
                        <td class="d-flex">
                            <a href="{{route('panel.setting.edit',$setting->id)}}" class="btn btn-primary mr-2">Düzenle</a>

                            <button type="button" class="silBtn btn btn-danger">Sil</button>
                        </td>
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

@section('customjs')
<script>

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
                            url:"{{route('panel.setting.destroy')}}",
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

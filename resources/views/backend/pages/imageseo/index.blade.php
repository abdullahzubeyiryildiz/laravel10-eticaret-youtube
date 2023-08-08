@extends('backend.layout.app')

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">İmageSeo</h4>


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
                  <th>Alt</th>
                  <th>Edit</th>
                </tr>
              </thead>
              <tbody>
                @if (!empty($images))
                    @foreach ($images as $image)
                        @if (!empty($image))
                            @foreach ($image as $item)
                            <tr class="item" item-id="{{ $item['image_no'] }}">
                                <td class="py-1">
                                        <img src="{{asset($item['image'] ?? 'img/resimyok.png')}}" ></img>
                                </td>

                                <td class="py-1">
                                       <input type="text" class="imageAlt" value="{{ $item['alt'] }}">
                                </td>
                                <td class="d-flex">
                                    <button class="btn btn-primary mr-2 saveBtn">Kaydet</button>
                                    <button type="button" class="silBtn btn btn-danger">Sil</button>
                                </td>
                              </tr>
                            @endforeach
                        @endif
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

$(document).on('click', '.saveBtn', function(e) {
            e.preventDefault();
                var item = $(this).closest('.item');
                 id = item.attr('item-id');
                 imageAlt = item.find('.imageAlt').val();
            console.log(imageAlt);
                alertify.confirm("Silmek İstediğine Eminmisin?","Silmek İstediğine Eminmisin?",
                    function(){

                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type:"POST",
                            url:"{{route('panel.imageseo.update')}}",
                            data:{
                                id:id,
                                imageAlt:imageAlt,
                            },
                            success: function (response) {
                                if (response.error == false)
                                {
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
                            url:"{{route('panel.imageseo.destroy')}}",
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

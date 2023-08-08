@extends('backend.layout.app')

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Page Seo</h4>
          <p class="card-description">
            <a href="{{route('panel.pageseo.create')}}" class="btn btn-primary">Yeni</a>
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
                  <th>Başlık</th>
                  <th>Slogan</th>
                  <th>Link</th>
                  <th>Status</th>
                  <th>Edit</th>
                </tr>
              </thead>
              <tbody>
                @if (!empty($pageseos) && $pageseos->count() > 0)
                    @foreach ($pageseos as $pageseo)
                    <tr class="item" item-id="{{ $pageseo->id }}">
                        <td class="py-1">

                          @php
                          $images = collect($pageseo->images->data ?? '');
                          @endphp
                          <img src="{{asset($images->sortByDesc('vitrin')->first()['image'] ?? 'img/resimyok.png')}}" ></img>

                        </td>
                        <td>{{$pageseo->dil}}</td>
                        <td>{{$pageseo->page ?? ''}}</td>
                        <td>{{$pageseo->pageinfo->page ?? ''}}</td>
                        <td>{{$pageseo->title}}</td>
                        <td>{{$pageseo->description}}</td>
                        <td>{{$pageseo->keywords}}</td>
                        <td>

                        </td>
                        <td class="d-flex">
                            <a href="{{route('panel.pageseo.edit',$pageseo->id)}}" class="btn btn-primary mr-2">Düzenle</a>


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
                            url:"{{route('panel.pageseo.destroy')}}",
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

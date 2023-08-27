@extends('frontend.layout.layout')

@section('customcss')
    <style>

        .sweetButtonColor {
            background-color: #333 !important;
        }

    </style>
@endsection

@section('content')
@include('frontend.inc.breadcrumb')

  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="h3 mb-3 text-black">İletişim</h2>
        </div>
        <div class="col-md-7">

            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

        @if (count($errors))
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
            @endforeach
        @endif

        <ul id="errors"></ul>

          <form method="post" id="createForm">
            @csrf
            <div class="p-3 p-lg-5 border">
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_fname" class="text-black">Ad Soyad <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_fname" name="name">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_email" class="text-black">E-posta <span class="text-danger">*</span></label>
                  <input type="email" class="form-control" id="c_email" name="email" placeholder="">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_subject" class="text-black">Konu </label>
                  <input type="text" class="form-control" id="c_subject" name="subject">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_message" class="text-black">Mesaj </label>
                  <textarea name="message" id="c_message" cols="30" rows="7" class="form-control"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-12">
                  <button type="submit" class="btn btn-primary btn-lg btn-block">Gönder</button>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-5 ml-auto">
          <div class="p-4 border mb-3">
            <span class="d-block text-primary h6 text-uppercase">Adres</span>
            <p class="mb-0">{!! $settings['adres'] !!}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('customjs')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

 $(document).on('submit', '#createForm', function(e) {
            e.preventDefault();
            const formData = $(this).serialize();
           var item = $(this);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:"POST",
                url:"{{route('iletisim.kaydet')}}",
                data:formData,
                success: function (response) {
                    console.log(response);

                        if(response.error == false) {
                            Swal.fire({
                            title: 'Başarılı!',
                            text: response.message,
                            icon: 'success',
                            confirmButtonText: 'Tamam',
                            customClass: {
                                    confirmButton: 'sweetButtonColor'
                                }
                            })
                        }else{
                            Swal.fire({
                            title: 'Hata!',
                            text: response.message,
                            icon: 'error',
                            confirmButtonText: 'Tamam',
                                customClass: {
                                    confirmButton: 'sweetButtonColor'
                                }
                            })
                        }

                        $("#createForm")[0].reset();

                },
                error: function(xhr, status, error)
                {

                    $.each(xhr.responseJSON.errors, function (key, item)
                    {
                        $("#errors").append("<li class='alert alert-danger'>"+item+"</li>")
                    });

                }

            });

        });
</script>
@endsection

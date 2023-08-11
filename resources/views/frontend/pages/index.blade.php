@extends('frontend.layout.layout')

@section('content')

    <div class="site-blocks-cover" style="background-image: url({{asset($slider->image ?? '')}});" data-aos="fade">
      <div class="container">
        <div class="row align-items-start align-items-md-center justify-content-end">
          <div class="col-md-5 text-center text-md-left pt-5 pt-md-0">
            <h1 class="mb-2">{{$slider->name ?? __('Merhaba')}}</h1>
            <div class="intro-text text-center text-md-left">
              <p class="mb-4">{{$slider->content ?? ''}} </p>
              <p>
                <a href="{{$slider->link ?? ''}}" class="btn btn-sm btn-primary">Ürünlerimiz</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="site-section site-section-sm site-blocks-1">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
            <div class="icon mr-4 align-self-start">
              <span class="{{$about->text_1_icon}}"></span>
            </div>
            <div class="text">
              <h2 class="text-uppercase">{{$about->text_1}}</h2>
              <p>{{$about->text_1_content}}</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
            <div class="icon mr-4 align-self-start">
              <span class="{{$about->text_2_icon}}"></span>
            </div>
            <div class="text">
              <h2 class="text-uppercase">{{$about->text_2}}</h2>
              <p>{{$about->text_2_content}}</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
            <div class="icon mr-4 align-self-start">
              <span class="{{$about->text_3_icon}}"></span>
            </div>
            <div class="text">
                <h2 class="text-uppercase">{{$about->text_3}}</h2>
                <p>{{$about->text_3_content}}</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section site-blocks-2">
      <div class="container">
        <div class="row">
            @if (!empty($categories) && $categories->count() > 0)
            @foreach ($categories->where('cat_ust',null) as $category)
            <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
                <a class="block-2-item" href="{{url($category->slug)}}">
                  <figure class="image">

                       @php
                      $imagescat = collect($category->images->data ?? '');
                      @endphp
                      <img src="{{asset($imagescat->sortByDesc('vitrin')->first()['image'] ?? 'img/resimyok.png')}}"  alt="{{$imagescat->sortByDesc('vitrin')->first()['alt'] ?? ''}}" class="img-fluid" ></img>

                  </figure>
                  <div class="text">
                    <h3>{{$category->name}}</h3>
                  </div>
                </a>
              </div>
            @endforeach
            @endif
        </div>
      </div>
    </div>

    <div class="site-section block-3 site-blocks-2 bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>Yeni Eklenen Ürünlerimiz</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="nonloop-block-3 owl-carousel">

                @if (!empty($lastproducts) && $lastproducts->count() > 0)
                    @foreach ($lastproducts as $item)
                    <div class="item">
                        <div class="block-4 text-center">
                          <figure class="block-4-image">

                      @php
                      $imageproduct = collect($item->images->data ?? '');
                      @endphp
                      <img src="{{asset($imageproduct->sortByDesc('vitrin')->first()['image'] ?? 'img/resimyok.png')}}"  alt="{{$imageproduct->sortByDesc('vitrin')->first()['alt'] ?? ''}}" class="img-fluid" ></img>


                          </figure>
                          <div class="block-4-text p-4">
                            <h3><a href="#">{{$item->name}}</a></h3>
                            <p class="mb-0">{{$item->category->name}}</p>
                            <p class="text-primary font-weight-bold">{{$item->price}} ₺</p>
                          </div>
                        </div>
                      </div>
                    @endforeach
                @endif
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section block-8">
      <div class="container">
        <div class="row justify-content-center  mb-5">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>Kampanya!</h2>
          </div>
        </div>
        <div class="row align-items-center">
          <div class="col-md-12 col-lg-7 mb-5">
            <a href="#"><img src="{{$settings['kampanya_image'] ?? ''}}" alt="Image placeholder" class="img-fluid rounded"></a>
          </div>
          <div class="col-md-12 col-lg-5 text-center pl-md-5">
            <h4>{{$settings['kampanya_title'] ?? ''}}</h4>
            <p>{{$settings['kampanya_text'] ?? ''}}</p>
            <p><a href="{{route('tumurunlerindirim')}}" class="btn btn-primary btn-sm">İndirideki Ürünler</a></p>
          </div>
        </div>
      </div>
    </div>
    @endsection

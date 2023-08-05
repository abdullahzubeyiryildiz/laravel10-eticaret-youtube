@extends('backend.layout.app')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Pageseo</h4>

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


                @if (!empty($pageseo->id))
                @php
                        $routelink = route('panel.pageseo.update',$pageseo->id);

                @endphp
                @else
                    @php
                        $routelink = route('panel.pageseo.store');
                    @endphp
                @endif
                <form action="{{$routelink}}" class="forms-sample" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (!empty($pageseo->id))
                        @method('PUT')
                    @endif


                      <div class="col-lg-12 d-flex images">
                        @if (isset($pageseo) && !empty($pageseo->images->data))
                        @php
                        $images = collect($pageseo->images->data ?? '');
                        @endphp
                        @foreach ($images->sortByDesc('vitrin') as $item)
                        <div class="item mx-4" data-id="{{$pageseo->id}}" data-model="Pageseo" data-image_no="{{$item['image_no']}}">
                            <img src="{{asset($item['image'])}}" class="img-thumbnail">
                            <button type="button" class="deleteImage btn btn-sm btn-danger btn btn-sm btn-danger d-flex align-items-center px-2 mt-3">X</button>
                            <div class="mt-4">
                                <label class="d-block">
                                    <input class="radio_animated vitrinBtn" type="radio" {{$item['vitrin'] == 1 ? 'checked' : ''}}  >Vitrin Yap
                                </label>
                            </div>
                        </div>
                        @endforeach
                    @endif
                   </div>

                    <div class="form-group">
                        <label>Resim</label>
                        <input type="file" name="image" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                          </span>
                        </div>
                      </div>







                <div class="form-group">
                    <label for="name">Dil</label>
                    <input type="text" class="form-control" id="dil" name="dil" value="{{$pageseo->dil ?? 'tr'}}" placeholder="Dil">
                </div>
                  <div class="form-group">
                    <label for="name">SayfaUrl</label>
                    <input type="text" class="form-control" id="page" name="page" value="{{$pageseo->page ?? ''}}" placeholder="Page Başlık">
                  </div>

                  <div class="form-group">
                    <label for="link">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{$pageseo->title ?? ''}}" placeholder="Title">
                  </div>

                  <div class="form-group">
                    <label for="link">Description</label>
                    <input type="text" class="form-control" id="description" name="description" value="{{$pageseo->description ?? ''}}" placeholder="Title">
                  </div>

                  <div class="form-group">
                    <label for="link">Keywords</label>
                    <input type="text" class="form-control" id="keywords" name="keywords" value="{{$pageseo->keywords ?? ''}}" placeholder="Title">
                  </div>
                  <div class="form-group">
                    <label for="slogan">İçerik kısa yazı</label>
                    <textarea class="form-control" id="contents" name="contents" placeholder="Content" rows="3">{!! $pageseo->contents ?? '' !!}</textarea>
                  </div>

                  <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </form>
              </div>
            </div>
          </div>
    </div>
@endsection

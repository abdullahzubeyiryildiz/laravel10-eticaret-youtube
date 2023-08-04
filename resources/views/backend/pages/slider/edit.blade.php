@extends('backend.layout.app')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Slider</h4>

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


                @if (!empty($slider->id))
                @php
                        $routelink = route('panel.slider.update',$slider->id);

                @endphp
                @else
                    @php
                        $routelink = route('panel.slider.store');
                    @endphp
                @endif
                <form action="{{$routelink}}" class="forms-sample" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (!empty($slider->id))
                        @method('PUT')
                    @endif


                      <div class="col-lg-12 d-flex images">
                        @if (isset($slider) && !empty($slider->images->data))
                        @php
                        $images = collect($slider->images->data ?? '');
                        @endphp
                        @foreach ($images->sortByDesc('vitrin') as $item)
                        <div class="item mx-4" data-id="{{$slider->id}}" data-model="Slider" data-image_no="{{$item['image_no']}}">
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
                    <label for="name">Başlık</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$slider->name ?? ''}}" placeholder="Slider Başlık">
                  </div>
                  <div class="form-group">
                    <label for="slogan">Slogan</label>
                    <textarea class="form-control" id="slogan" name="content" placeholder="Slider Slogan" rows="3">{!! $slider->content ?? '' !!}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="link">Link</label>
                    <input type="text" class="form-control" id="link" name="link" value="{{$slider->link ?? ''}}" placeholder="Slider link">
                  </div>


                  <div class="form-group">
                    <label for="durum">Durum</label>
                    @php
                      $status =  $slider->status ?? '1';
                    @endphp
                    <select name="status" id="status" class="form-control">
                        <option value="0" {{$status == '0' ? 'selected' : ''}}>Pasif</option>
                        <option value="1" {{$status == '1' ? 'selected' : ''}}>Aktif</option>
                    </select>
                  </div>

                  <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </form>
              </div>
            </div>
          </div>
    </div>
@endsection

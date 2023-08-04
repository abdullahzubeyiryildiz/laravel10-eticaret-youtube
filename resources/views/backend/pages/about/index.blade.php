@extends('backend.layout.app')

@section('customcss')
    <style>
        .ck-content {
            height: 300px !important;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Hakkımızda</h4>

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

                <form action="{{ route('panel.about.update') }}" class="forms-sample" method="POST" enctype="multipart/form-data">
                    @csrf


                      <div class="col-lg-12 d-flex images">
                        @if (!empty($about->images->data))
                        @php
                        $images = collect($about->images->data ?? '');
                        @endphp
                        @foreach ($images->sortByDesc('vitrin') as $item)
                        <div class="item mx-4" data-id="{{$about->id}}" data-model="About" data-image_no="{{$item['image_no']}}">
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
                    <input type="text" class="form-control" id="name" name="name" value="{{$about->name ?? ''}}" placeholder="Slider Başlık">
                  </div>
                  <div class="form-group">
                    <label for="editor">Hakkımızda</label>
                    <textarea class="form-control" id="editor" name="content" placeholder="Hakkımızda" rows="3">{!! $about->content ?? '' !!}</textarea>
                  </div>


                  <div class="form-group">
                    <label for="text_1_icon">İCON 1</label>
                    <input type="text" class="form-control" id="text_1_icon" name="text_1_icon" value="{{$about->text_1_icon ?? ''}}" placeholder="İcon 1">
                  </div>



                  <div class="form-group">
                    <label for="text_1">Text 1</label>
                    <input type="text" class="form-control" id="text_1" name="text_1" value="{{$about->text_1 ?? ''}}" placeholder="İcon 1">
                  </div>


                  <div class="form-group">
                    <label for="text_1_content">Text 1 Content</label>
                    <textarea class="form-control" id="text_1_content" name="text_1_content" placeholder="Text 1Content" rows="3">{!! $about->text_1_content ?? '' !!}</textarea>
                  </div>



                  <div class="form-group">
                    <label for="text_2_icon">İCON 2</label>
                    <input type="text" class="form-control" id="text_2_icon" name="text_2_icon" value="{{$about->text_2_icon ?? ''}}" placeholder="İcon 2">
                  </div>



                  <div class="form-group">
                    <label for="text_2">Text 2</label>
                    <input type="text" class="form-control" id="text_2" name="text_2" value="{{$about->text_2 ?? ''}}" placeholder="Text 2">
                  </div>


                  <div class="form-group">
                    <label for="text_2_content">Text 2 Content</label>
                    <textarea class="form-control" id="text_2_content" name="text_2_content" placeholder="Text 2 1Content" rows="3">{!! $about->text_1_content ?? '' !!}</textarea>
                  </div>



                  <div class="form-group">
                    <label for="text_3_icon">İCON 3</label>
                    <input type="text" class="form-control" id="text_3_icon" name="text_3_icon" value="{{$about->text_3_icon ?? ''}}" placeholder="İcon 2">
                  </div>



                  <div class="form-group">
                    <label for="text_3">Text 3</label>
                    <input type="text" class="form-control" id="text_3" name="text_3" value="{{$about->text_3 ?? ''}}" placeholder="Text 2">
                  </div>


                  <div class="form-group">
                    <label for="text_3_content">Text 3 Content</label>
                    <textarea class="form-control" id="text_3_content" name="text_3_content" placeholder="Text 3 1Content" rows="3">{!! $about->text_1_content ?? '' !!}</textarea>
                  </div>

                  <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </form>
              </div>
            </div>
          </div>
    </div>
@endsection

@section('customjs')
<script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/translations/tr.js"></script>

<script>

   const option = {
            language: 'tr',
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                        { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                        { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                        { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                        { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
                    ]
                },
            };

       ClassicEditor
        .create( document.querySelector( '#editor' ), option )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection

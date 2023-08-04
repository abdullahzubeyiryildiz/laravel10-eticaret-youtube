@extends('backend.layout.app')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">İletişim</h4>

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


                <form action="{{route('panel.contact.update',$contact->id)}}" class="forms-sample" method="POST" enctype="multipart/form-data">
                    @csrf

                   @method('PUT')
                  <div class="form-group">
                    <label for="name">Ad Soyad</label>
                    <input type="text" class="form-control" id="name" readonly value="{{$contact->name ?? ''}}">
                  </div>
                  <div class="form-group">
                    <label for="name">Email</label>
                    <input type="email" class="form-control" id="email" readonly value="{{$contact->email ?? ''}}">
                  </div>
                  <div class="form-group">
                    <label for="subject">Konu</label>
                    <input type="text" class="form-control" id="subject" readonly  value="{{$contact->subject ?? ''}}">
                  </div>
                  <div class="form-group">
                    <label for="message">Mesaj</label>
                    <textarea class="form-control" id="message" rows="3" readonly>{!! $contact->message ?? '' !!}</textarea>
                  </div>

                  <div class="form-group">
                    <label for="durum">Durum</label>
                    @php
                      $status =  $contact->status ?? '1';
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

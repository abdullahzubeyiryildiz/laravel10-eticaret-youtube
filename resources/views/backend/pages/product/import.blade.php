@extends('backend.layout.app')

@section('content')

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


<form action="{{route('panel.product.importStore')}}" class="forms-sample" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="file">İmport Excel</label>
        <input type="file" name="file" id="file" class="form-control">
    </div>
  <button type="submit" class="btn btn-primary mr-2">Submit</button>
</form>
@endsection

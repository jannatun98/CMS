@extends('backend.master')
@section('content')
<div style = "padding:15px">
<h2 style="text-align:center">Location</h2>

<form  action="{{route('location.update',$locations->id)}}" method="post">
@method('put')

@if($errors->any())
        @foreach($errors->all() as $error)
          <p class="alert alert-danger">{{$error}}</p>
        @endforeach
    @endif

    @if(session()->has('message'))
    <p class="alert alert-success">{{session()->get('message')}}</p>
    @endif

 @csrf
 <div class="form-group">
 <label for="name">Name</label>
    <input required id="name" type="text" class="form-control" name="location_name" placeholder="{{$locations->name}}">
 </div>
  <div class="form-group">
    <label for="address">Address</label>
    <input required id="address" type="text" class="form-control" name="location_address"  placeholder="{{$locations->address}}">
  </div>
  

<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

@endsection
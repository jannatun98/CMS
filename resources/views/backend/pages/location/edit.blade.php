@extends('backend.master')
@section('content')
<div style = "padding:15px">
<h2 style="text-align:center">Location</h2>

<form  action="{{route('location.update',$locations->id)}}" method="post">
@method('put')

 @csrf
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="location_name" id="name" placeholder="{{$locations->name}}">
  </div>

  <div class="form-group">
    <label for="address">Address</label>
    <input type="text" class="form-control" name="location_address" id="address" placeholder="{{$locations->address}}">
  </div>
  

<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

@endsection
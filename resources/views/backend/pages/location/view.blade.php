@extends('backend.master')
@section('content')
<div style="padding:15px">
<h2 style="text-align:center">Location</h2>
<div class="form-group">
    <label for="">Name</label>
    <input type="text" class="form-control" readonly name="location_name" id="" placeholder="{{$locations->name}}">
  </div>

  <div class="form-group">
    <label for="">Address</label>
    <input type="text" class="form-control" readonly name="location_address" id="" placeholder="{{$locations->address}}">
  </div>
  <a class="btn btn-primary" href="{{route('location')}}">Back</a>
  </div>
@endsection
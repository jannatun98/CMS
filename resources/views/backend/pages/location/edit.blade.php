@extends('backend.master')
@section('content')

<h2 style="text-align:center">Location</h2>

<form  action="{{route('location.update',$locations->id)}}" method="post">
 @csrf
  <div class="form-group">
    <label for="">Name</label>
    <input type="text" class="form-control" name="location_name" id="" placeholder="{{$locations->name}}">
  </div>

  <div class="form-group">
    <label for="">Address</label>
    <input type="text" class="form-control" name="location_address" id="" placeholder="{{$locations->address}}">
  </div>
  



<button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
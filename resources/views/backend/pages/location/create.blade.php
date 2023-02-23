@extends('backend.master')
@section('content')

<div style = "padding:15px">
<h2 style="text-align:center">Location</h2>
<form  action="{{route('location.store')}}" method="post">
  
 @csrf
  <div class="form-group">
    <label for="name">Name</label>
    <input required id="name" type="text" class="form-control" name="location_name" placeholder="Enter name">
  </div>

  <div class="form-group">
    <label for="address">Address</label>
    <input required id="address" type="text" class="form-control" name="location_address" placeholder="Enter Address">
  </div>
  
<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

@endsection
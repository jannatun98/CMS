@extends('backend.master')
@section('content')

<div style="padding:15px">
<h2 style="text-align:center">Crisis</h2>
<form action="{{route('crisis.store')}}" method="post">

    @csrf
  <div class="form-group" >
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" placeholder="Enter name">
    <label for="image">Upload Image</label>
    <input id="image" type="file" class="form-control" name="image">
    <label for="location">Location</label>
    <input type="text" class="form-control" name="location" placeholder="Enter location">
    <label for="crisis type">Crisis Type</label>
    <input type="text" class="form-control" name="crisis_type" placeholder="Enter crisis type">
    <label for="date">Date</label>
    <input type="date" class="form-control" name="date" placeholder="Enter date">
  </div>
  <button type="submit" class="btn btn-primary">Back</button>
</form>
</div>
@endsection
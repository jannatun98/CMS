@extends('backend.master')
@section('content')

<div style="padding:15px">
<h2 style="text-align:center">Crisis</h2>
<form action="{{route('crisis.store')}}" method="post" enctype="multipart/form-data">

    @csrf
  <div class="form-group" >
    <label for="name">Name</label>
    <input required id="name" type="text" class="form-control" name="name" placeholder="Enter name">
    <label for="image">Upload Image</label>
    <input id="image" type="file" class="form-control" name="image">
    <label for="location">Location</label>
    <input required id="location" type="text" class="form-control" name="location" placeholder="Enter location">
    <label for="crisis_type">Crisis Type</label>
    <input required id="crisis_type" type="text" class="form-control" name="crisis_type" placeholder="Enter crisis type">
    <label for="date">Date</label>
    <input required id="date" type="date" class="form-control" name="date" placeholder="Enter date">
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</div>


@endsection
@extends('backend.master')
@section('content')

<div style="padding:15px">
<h2 style="text-align:center">Crisis</h2>
<form action="{{route('crisis.create')}}">

    @csrf
  <div class="form-group" method="POST">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" placeholder="Enter name">
    <label for="location">Location</label>
    <input type="text" class="form-control" id="location" placeholder="Enter location">
    <label for="crisis type">Crisis Type</label>
    <input type="text" class="form-control" id="crisis type" placeholder="Enter crisis type">
    <label for="date">Date</label>
    <input type="date" class="form-control" id="date" placeholder="Enter date">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>



@endsection
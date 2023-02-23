@extends('backend.master')
@section('content')

<div style="padding:15px">
<h2 style="text-align:center">Crisis</h2>
<form action="{{route('crisis.update',$cri->id)}}" method="post">
    @method('put')

    @csrf
  <div class="form-group" >
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" placeholder="{{$cri->name}}">
    <label for="image">Upload Image</label>
    <input id="image" type="file" class="form-control" name="image">
    <label for="location">Location</label>
    <input type="text" class="form-control" name="location" placeholder="{{$cri->location}}">
    <label for="crisis type">Crisis Type</label>
    <input type="text" class="form-control" name="crisis_type" placeholder="{{$cri->crisis_type}}">
    <label for="date">Date</label>
    <input type="date" class="form-control" name="date" placeholder="{{$cri->date}}">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

@endsection
@extends('backend.master')
@section('content')

<div style="padding:15px">
<h2 style="text-align:center">Volunteers</h2>
<form action="{{route('volunteer.store')}}" method="post">

    @csrf
  <div class="form-group" >
    <label for="name">Name</label>
    <input required id="name" type="text" class="form-control" name="name">
    <label for="email">Email</label>
    <input required id="email" type="email" class="form-control" name="email">
    <label for="phone">Phone</label>
    <input required id="phone" type="tel" class="form-control" name="phone">
    <label for="address">Address</label>
    <input required id="address" type="text" class="form-control" name="address">
    
  <button type="submit"  class="btn btn-primary">Submit</button>
</form>
</div>


@endsection
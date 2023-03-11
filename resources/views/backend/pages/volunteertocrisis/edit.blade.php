@extends('backend.master')
@section('content')

<div style="padding:15px">
<h2 style="text-align:center">Volunteers To Crisis</h2>
<form action="{{route('volunteertocrisis.update',$volunteertocris->id)}}" method="post">
  @method('put')
    @csrf
  <div class="form-group" >
    <label for="crisis_id">Crisis ID</label>
    <input required id="crisis_id" value="{{$volunteertocris->crisis_id}}" type="text" class="form-control" name="crisis_id">
    <label for="volunteer_id">Volunteer ID</label>
    <input required id="volunteer_id" value="{{$volunteertocris->volunteer_id}}" type="text" class="form-control" name="volunteer_id">
    
  <button type="submit"  class="btn btn-primary">Submit</button>
</form>
</div>


@endsection
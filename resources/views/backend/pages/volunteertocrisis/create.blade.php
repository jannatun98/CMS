@extends('backend.master')
@section('content')

<div style="padding:15px">
<h2 style="text-align:center">Volunteers To Crisis</h2>
<form action="{{route('volunteertocrisis.store')}}" method="post">

@if($errors->any())
        @foreach($errors->all() as $error)
          <p class="alert alert-danger">{{$error}}</p>
        @endforeach
    @endif

    @if(session()->has('message'))
    <p class="alert alert-success">{{session()->get('message')}}</p>
    @endif

    @csrf
  <div class="form-group" >
  <label for="crisis_id">Crisis Name</label>
    <select class="form-control" name="crisis_id" id="crisis_id" >
      @foreach($crys as $cry)
      <option value="{{$cry->id}}">{{$cry->name}}</option>
      @endforeach
    </select>

    <label for="volunteer_id">Volunteer Name</label>
    <select class="form-control" name="volunteer_id" id="volunteer_id" >
      @foreach($volunteer as $volun)
      <option value="{{$volun->id}}">{{$volun->name}}</option>
      @endforeach
    </select>
    
  <button type="submit"  class="btn btn-primary">Submit</button>
</form>
</div>


@endsection
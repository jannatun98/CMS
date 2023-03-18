@extends('backend.master')
@section('content')

<div style="padding:15px">
<h2 style="text-align:center">Volunteers</h2>
<form action="{{route('volunteer.update',$volunteer->id)}}" method="post">
    @method('put')

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
    <label for="name">Name</label>
    <input required id="name" value="{{$volunteer->name}}" type="text" class="form-control" name="name">
    <label for="email">Email</label>
    <input required id="email" value="{{$volunteer->email}}" type="email" class="form-control" name="email">
    <label for="phone">Phone</label>
    <input required id="phone" value="{{$volunteer->phone}}" type="tel" class="form-control" name="phone">
    <label for="address">Address</label>
    <input required id="address" value="{{$volunteer->address}}" type="text" class="form-control" name="address">
    
  <button type="submit"  class="btn btn-primary">Submit</button>
</form>
</div>


@endsection
@extends('backend.master')
@section('content')

<div style="padding:15px">
<h2 style="text-align:center">Donors</h2>
<form action="{{route('donor.update',$donor->id)}}" method="post" enctype="multipart/form-data">
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
    <input required id="name" value="{{$donor->name}}" type="text" class="form-control" name="name" placeholder="Enter donor name">
    <label for="image">Upload Image</label>
    <input id="image" type="file" class="form-control" name="image">
    <label for="address">Address</label>
    <input required id="address" value="{{$donor->address}}" type="text" class="form-control" name="address">
    <label for="age">Age</label>
    <input required id="age" value="{{$donor->age}}" type="text" class="form-control" name="age" placeholder="Enter age">
    <label for="gender">Select Gender</label>
       <select name="gender" id="gender" value="{{$donor->gender}}" class="form-control">
          <option value="male">Male</option>
          <option value="female">Female</option>
       </select>
    <label for="phone">Phone</label>
    <input required id="phone" value="{{$donor->phone}}" type="tel" class="form-control" name="phone">
    
  <button type="submit"  class="btn btn-primary">Submit</button>
</form>
</div>


@endsection
@extends('backend.master')
@section('content')

<div style="padding:15px">
  <h2 style="text-align:center">Donors</h2>
  <form action="{{route('donor.store')}}" method="post" enctype="multipart/form-data">

    @if($errors->any())
    @foreach($errors->all() as $error)
    <p class="alert alert-danger">{{$error}}</p>
    @endforeach
    @endif

    @if(session()->has('message'))
    <p class="alert alert-success">{{session()->get('message')}}</p>
    @endif

    @csrf
    
    <div class="form-group">
    @foreach
      <label for="name">Name</label>
      <input required id="name" type="text" class="form-control" name="name" placeholder="Enter donor name">
      <label for="email">Email</label>
      <input required id="email" type="email" class="form-control" name="email" placeholder="Enter donor email">
      <label for="image">Upload Image</label>
      <input id="image" type="file" class="form-control" name="image">
      <label for="address">Address</label>
      <input required id="address" type="text" class="form-control" name="address">
      <label for="date_of_birth">Date of Birth</label>
      <input required id="date_of_birth" type="date" class="form-control" name="date_of_birth" placeholder="Enter your date of birth">
      <label for="gender">Select Gender</label>
      <select name="gender" id="gender" class="form-control">
        <option value="male">Male</option>
        <option value="female">Female</option>
      </select>
      <label for="phone">Phone</label>
      <input required id="phone" type="tel" class="form-control" name="phone">

      <button type="submit" class="btn btn-primary">Submit</button>
      @endforeach
    </div>

  </form>

</div>

@endsection
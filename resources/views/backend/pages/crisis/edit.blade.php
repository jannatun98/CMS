@extends('backend.master')
@section('content')

<div style="padding:15px">
<h2 style="text-align:center">Crisis</h2>
<form action="{{route('crisis.update',$cri->id)}}" method="post" enctype="multipart/form-data">
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
    <input required id="name" value="{{$cri->name}}" type="text" class="form-control" name="name" placeholder="Enter name">
    <label for="image">Upload Image</label>
    <input id="image" type="file" class="form-control" name="image">
    <label for="description">Description</label>
    <input required id="description" value="{{$cri->description}}" type="text" class="form-control" name="description">
    
    <label for="name">Location</label>
    <select class="form-control" name="location_id" id="location_id">
      @foreach($locate as $loc)
      <option value="{{$loc->id}}"> {{$loc->name}} </option>
     @endforeach
    </select>

    <label for="amount_need">Amount Need</label>
    <input required id="amount_need" value="{{$cri->amount_need}}" type="number" class="form-control" name="amount_need">
    <label for="amount_raised">Amount Raised</label>
    <input readonly required id="amount_raised" value="{{$cri->amount_raised}}" type="number" class="form-control" name="amount_raised">
    
    <label for="crisistype_id">Crisis Type</label>
    <select class="form-control" name="crisistype_id" id="crisistype_id">
      @foreach($crisis as $cri)
      <option value="{{$cri->id}}"> {{$cri->name}} </option>
     @endforeach
    </select>

    <label for="from_date">From Date</label>
    <input required id="from_date" value="{{$cri->from_date}}" type="date" class="form-control" name="from_date" placeholder="Enter date">
    <label for="to_date">To Date</label>
    <input required id="to_date" value="{{$cri->to_date}}" type="date" class="form-control" name="to_date" placeholder="Enter date">
    
    <!-- <label for="volunteer_id">Volunteer Name</label>
    <select class="form-control" name="volunteer_id" id="volunteer_id">
      @foreach($volunteers as $vol)
      <option value="{{$vol->id}}">{{$vol->name}}</option>
      @endforeach
    </select> -->

  </div>
  <button type="submit" value="update" class="btn btn-primary">Update</button>
</form>
</div>

@endsection
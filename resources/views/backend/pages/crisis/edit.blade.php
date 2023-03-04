@extends('backend.master')
@section('content')

<div style="padding:15px">
<h2 style="text-align:center">Crisis</h2>
<form action="{{route('crisis.update',$cri->id)}}" method="post">
    @method('put')

    @csrf
    <div class="form-group" >
    <label for="name">Name</label>
    <input required id="name" value="{{$cri->name}}" type="text" class="form-control" name="name" placeholder="Enter name">
    <label for="image">Upload Image</label>
    <input id="image" type="file" class="form-control" name="image">
    <label for="description">Description</label>
    <input required id="description" value="{{$cri->description}}" type="text" class="form-control" name="description">
    <label for="location">Location</label>
    <input required id="location" value="{{$cri->location}}" type="text" class="form-control" name="location" placeholder="Enter location">
    <label for="amount_need">Amount Need</label>
    <input required id="amount_need" value="{{$cri->amount_need}}" type="number" class="form-control" name="amount_need">
    <label for="amount_raised">Amount Raised</label>
    <input required id="amount_raised" value="{{$cri->amount_raised}}" type="number" class="form-control" name="amount_raised">
    <label for="crisistype_id">Crisis Type ID</label>
    <input required id="crisistype_id" value="{{$cri->crisistype_id}}" type="number" class="form-control" name="crisistype_id" placeholder="Enter crisis type">
    <label for="from_date">From Date</label>
    <input required id="from_date" value="{{$cri->from_date}}" type="date" class="form-control" name="from_date" placeholder="Enter date">
    <label for="to_date">To Date</label>
    <input required id="to_date" value="{{$cri->to_date}}" type="date" class="form-control" name="to_date" placeholder="Enter date">
    <label for="volunteer_id">Volunteer ID</label>
    <input required id="volunteer_id" value="{{$cri->volunteer_id}}" type="number" class="form-control" name="volunteer_id">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

@endsection
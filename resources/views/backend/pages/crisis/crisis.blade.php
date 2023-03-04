@extends('backend.master')
@section('content')
<h2 style="text-align:center">Crisis</h2>
<a href="{{route('crisis.create')}}" class="btn btn-outline-primary text-black">Add Crisis</a>

<table class="table table-primary table-striped">
  
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Location</th>
      <th scope="col">Amount Need</th>
      <th scope="col">Amount Raised</th>
      <th scope="col">Crisis Type ID</th>
      <th scope="col">From Date</th>
      <th scope="col">To Date</th>
      <th scope="col">Volunteer ID</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
  @foreach($crisis as $cry)
    <tr>
      <th scope="row">{{$cry->id}}</th>
      <td>
        <img width="70px" src="{{url('/uploads/'.$cry->image)}}" alt="Image">
      </td>
      <td>{{$cry->name}}</td>
      <td>{{$cry->description}}</td>
      <td>{{$cry->location}}</td>
      <td>{{$cry->amount_need}}</td>
      <td>{{$cry->amount_raised}}</td>
      <td>{{$cry->crisistype_id}}</td>
      <td>{{$cry->from_date}}</td>
      <td>{{$cry->to_date}}</td>
      <td>{{$cry->volunteer_id}}</td>
      <td>
        <a class="btn btn-success" href="{{route('crisis.view',$cry->id)}}">View</a>
        <a class="btn btn-primary" href="{{route('crisis.edit',$cry->id)}}">Edit</a>
        <a class="btn btn-danger" href="{{route('crisis.delete',$cry->id)}}">Delete</a>

      </td>

    </tr>
    @endforeach
  </tbody>
  
</table>

{{$crisis->links()}}


@endsection
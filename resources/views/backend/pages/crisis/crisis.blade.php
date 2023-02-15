@extends('backend.master')
@section('content')
<h2 style="text-align:center">Crisis</h2>
<a href="{{route('crisis.create')}}" class="btn btn-outline-primary text-black">Add Crisis</a>

<table class="table table-primary table-striped">
  
  <thead>
    <tr>
      <th scope="col">ID</th>
    
      <th scope="col">Name</th>
      <th scope="col">Location</th>
      <th scope="col">Crisis Type</th>
      <th scope="col">Date</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
  @foreach($crisis as $cry)
    <tr>
      <th scope="row">{{$cry->id}}</th>
      
      <td>{{$cry->name}}</td>
      <td>{{$cry->location}}</td>
      <td>{{$cry->crisis_type}}</td>
      <td>{{$cry->date}}</td>
      <td>
        <a class="btn btn-success" href="{{route('crisis.view',$cry->id)}}">View</a>
        <a class="btn btn-primary" href="{{route('crisis.edit',$cry->id)}}">Edit</a>
        <a class="btn btn-danger" href="{{route('crisis.delete',$cry->id)}}">Delete</a>

      </td>

    </tr>
    @endforeach
  </tbody>
  
</table>

@endsection
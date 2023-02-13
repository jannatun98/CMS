@extends('backend.master')

@section('content')
<h2 style="text-align:center">Location</h2>
<table class="table  table-primary table-striped">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($locations as $data)
    <tr>
      <th scope="row">{{$data->id}}</th>
      <td>{{$data->name}}</td>
      <td>{{$data->address}}</td>
      <td>
        <a class="btn btn-primary" href="{{route('location.view',$data->id)}}">View</a>
        <a class="btn btn-primary" href="{{route('location.edit',$data->id)}}">Edit</a>
        <a class="btn btn-danger" href="{{route('location.delete',$data->id)}}">Delete</a>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
<a class="btn btn-primary" href="{{route('location.create')}}">Add Location</a>



@endsection
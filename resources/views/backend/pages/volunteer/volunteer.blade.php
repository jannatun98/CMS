@extends('backend.master')
@section('content')
<h2 style="text-align:center">Volunteers</h2>
<a href="{{route('volunteer.create')}}" class="btn btn-outline-primary text black">Add Volunteer</a>

<table class="table table-primary table-striped ">
<thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Status</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>


    </tr>
  </thead>
  <tbody>
    @foreach($volunteers as $volunteer)
    <tr>
    <th scope="row">{{$volunteer->id}}</th>
    <td scope="row">{{$volunteer->name}}</td>
    <td scope="row">{{$volunteer->email}}</td>
    <td scope="row">{{$volunteer->phone}}</td>
    <td scope="row">{{$volunteer->address}}</td>
    <td>
      <a class="btn btn-success" href="{{route('volunteer.view',$volunteer->id)}}">View</a>
      <a class="btn btn-primary" href="{{route('volunteer.edit',$volunteer->id)}}">Edit</a>
      <a class="btn btn-danger" href="{{route('volunteer.delete',$volunteer->id)}}">Delete</a>
    </td>

    </tr>

    @endforeach
  </tbody>


</table>

{{$volunteers->links()}}


@endsection
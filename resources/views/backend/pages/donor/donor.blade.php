@extends('backend.master')
@section('content')
<h2 style="text-align:center">Donors</h2>
<a href="{{route('donor.create')}}" class="btn btn-outline-primary text black">Add Donors</a>

<table class="table table-primary table-striped ">
<thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Age</th>
      <th scope="col">Gender</th>
      <th scope="col">Phone</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
    @foreach($donors as $donor)
    <tr>
    <th scope="row">{{$donor->id}}</th>
    <td>
        <img width="120px" height="120px" src="{{url('/uploads/'.$donor->image)}}" alt="Image" >
    </td>
    <td scope="row">{{$donor->name}}</td>
    <td scope="row">{{$donor->address}}</td>
    <td scope="row">{{$donor->age}}</td>
    <td scope="row">{{$donor->gender}}</td>
    <td scope="row">{{$donor->phone}}</td>
    <td>
      <a class="btn btn-success" href="{{route('donor.view',$donor->id)}}">View</a>
      <a class="btn btn-primary" href="{{route('donor.edit',$donor->id)}}">Edit</a>
      <a class="btn btn-danger" href="{{route('donor.delete',$donor->id)}}">Delete</a>
    </td>

    </tr>

    @endforeach
  </tbody>


</table>

{{$donors->links()}}


@endsection
@extends('backend.master')
@section('content')
<div style="padding:15px">
<h2 style="text-align:center">Donors</h2>
<!-- <a href="{{route('donor.create')}}" class="btn btn-outline-primary text black">Add Donors</a> -->

<table class="table table-primary table-striped ">
<thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Address</th>
      <th scope="col">Date of Birth</th>
      <th scope="col">Gender</th>
      <th scope="col">Phone</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
   @foreach($donors as $key=>$data)
    <tr>
    <th scope="row">{{$key+1}}</th>
    <td>
        <img width="120px" height="120px" src="{{url('/uploads/'.$data->image)}}" alt="Image" >
    </td>
    <td scope="row">{{$data->name}}</td>
    <td scope="row">{{$data->email}}</td>
    <td scope="row">{{$data->address}}</td>
    <td scope="row">{{$data->date_of_birth}}</td>
    <td scope="row">{{$data->gender}}</td>
    <td scope="row">{{$data->phone}}</td>
    <td>
      <a class="btn btn-success" href="{{route('donor.view',$data->id)}}">View</a>
      <!-- <a class="btn btn-primary" href="">Edit</a>
      <a class="btn btn-danger" href="">Delete</a> -->
    </td>

    </tr>
@endforeach
   
  </tbody>


</table>

{{$donors->links()}}
</div>


@endsection
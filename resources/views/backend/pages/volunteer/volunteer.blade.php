@extends('backend.master')
@section('content')
<div style="padding:15px">
<h2 style="text-align:center">Volunteers</h2>
<!-- <a href="{{route('volunteer.create')}}" class="btn btn-outline-primary text black">Add Volunteer</a> -->

<table class="table table-primary table-striped ">
<thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Address</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>



    </tr>
  </thead>
  <tbody>
    @foreach($volunteers as $key=>$volunteer)
    <tr>
    <th scope="row">{{$key+1}}</th>
    <td>
        <img width="120px" height="120px" src="{{url('/uploads/'.$volunteer->image)}}" alt="Image" >
    </td>
    <td scope="row">{{$volunteer->name}}</td>
    <td scope="row">{{$volunteer->email}}</td>
    <td scope="row">{{$volunteer->phone}}</td>
    <td scope="row">{{$volunteer->address}}</td>
    <td scope="row">{{$volunteer->status}}</td>
    <td>
      
      
      <!-- accept - view reject
      reject = view -->
      @if($volunteer->status != "Accepted" && $volunteer->status != "Rejected")
      <a class="btn btn-success" href="{{route('volunteer.view',$volunteer->id)}}">View</a>
      <a class="btn btn-primary" href="{{route('volunteer.accept',$volunteer->id)}}">Accept</a>
      <a class="btn btn-danger" href="{{route('volunteer.reject',$volunteer->id)}}">Reject</a>
      @endif
      @if($volunteer->status == "Accepted")
      <a class="btn btn-success" href="{{route('volunteer.view',$volunteer->id)}}">View</a>
      <a class="btn btn-danger" href="{{route('volunteer.reject',$volunteer->id)}}">Reject</a>
      @endif
      @if($volunteer->status == "Rejected")
      <a class="btn btn-success" href="{{route('volunteer.view',$volunteer->id)}}">View</a>
      @endif
      
      <!-- <a class="btn btn-primary" href="{{route('volunteer.edit',$volunteer->id)}}">Edit</a> -->
      <!-- <a class="btn btn-danger" href="{{route('volunteer.delete',$volunteer->id)}}">Delete</a> -->
    </td>

    </tr>

    @endforeach
  </tbody>


</table>

{{$volunteers->links()}}
</div>

@endsection
@extends('backend.master')
@section('content')
<div style="padding:15px">
<h2 style="text-align:center">Volunteer To Crisis</h2>
<!-- <a href="{{route('volunteertocrisis.create')}}" class="btn btn-outline-primary text black">Add a Volunteer to Crisis</a> -->

<table class="table table-primary table-striped ">
<thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Crisis ID</th>
      <th scope="col">Volunteer ID</th>
      <th scope="col">Action</th>
     
    </tr>
  </thead>
  <tbody>
    @foreach($volunteertocri as $key=>$data)
    
    <tr>
    <th scope="row">{{$key+1}}</th>
    <td scope="row">{{$data->Crisis->name}}</td>
    <td scope="row">{{$data->User->name}}</td>
    <td>
      <a class="btn btn-success" href="{{route('volunteertocrisis.view',$data->id)}}">View</a>
      <a class="btn btn-danger" href="{{route('volunteertocrisis.delete',$data->id)}}">Delete</a>
    </td>

    </tr>

    @endforeach
  </tbody>


</table>

{{$volunteertocri->links()}}

</div>

@endsection
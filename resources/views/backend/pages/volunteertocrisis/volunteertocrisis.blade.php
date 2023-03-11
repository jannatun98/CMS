@extends('backend.master')
@section('content')
<h2 style="text-align:center">Volunteer To Crisis</h2>
<a href="{{route('volunteertocrisis.create')}}" class="btn btn-outline-primary text black">Add a Volunteer to Crisis</a>

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
    @foreach($volunteertocri as $volunteertocris)
    <tr>
    <th scope="row">{{$volunteertocris->id}}</th>
    <td scope="row">{{$volunteertocris->crisis_id}}</td>
    <td scope="row">{{$volunteertocris->volunteer_id}}</td>
    <td>
      <a class="btn btn-success" href="">View</a>
      <a class="btn btn-primary" href="{{route('volunteertocrisis.edit',$volunteertocris->id)}}">Edit</a>
      <a class="btn btn-danger" href="{{route('volunteertocrisis.delete',$volunteertocris->id)}}">Delete</a>
    </td>

    </tr>

    @endforeach
  </tbody>


</table>

{{$volunteertocri->links()}}


@endsection
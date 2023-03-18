@extends('backend.master')
@section('content')
<h2 style="text-align:center">Crisis Types</h2>
<a href="{{route('crisistypes.create')}}" class="btn btn-outline-primary text black">Add Crisis Types</a>

<table class="table table-primary table-striped ">
<thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
    @foreach($crisistypes as $key=>$types)
    <tr>
    <th scope="row">{{$key+1}}</th>
    <td scope="row">{{$types->name}}</td>
    <td scope="row">{{$types->status}}</td>
    <td>
      <a class="btn btn-success" href="{{route('crisistypes.view',$types->id)}}">View</a>
      <a class="btn btn-primary" href="{{route('crisistypes.edit',$types->id)}}">Edit</a>
      <a class="btn btn-danger" href="{{route('crisistypes.delete',$types->id)}}">Delete</a>
    </td>

    </tr>

    @endforeach
  </tbody>


</table>

{{$crisistypes->links()}}


@endsection
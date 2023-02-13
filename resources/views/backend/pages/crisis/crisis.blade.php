@extends('backend.master')
@section('content')
<h1>Crisis List</h1>
<a href="{{url('/crisis/crisisform')}}" class="btn btn-outline-success text-black" >Create New Crisis</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Location</th>
      <th scope="col">Crisis Type</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td></td>
      <td></td>
      <td></td>
    </tr>
  </tbody>
</table>

@endsection
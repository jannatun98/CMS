@extends('backend.master')
@section('content')
<h2 style="text-align:center">Expense Category</h2>
<a href="{{route('expensecategory.create')}}" class="btn btn-outline-primary text black">Add Expense Category</a>

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
    @foreach($expensecats as $expensecat)
    <tr>
    <th scope="row">{{$expensecat->id}}</th>
    <td scope="row">{{$expensecat->name}}</td>
    <td scope="row">{{$expensecat->status}}</td>
    <td scope="row">{{$expensecat->description}}</td>
    <td>
      <a class="btn btn-success" href="{{route('expensecategory.view',$expensecat->id)}}">View</a>
      <a class="btn btn-primary" href="{{route('expensecategory.edit',$expensecat->id)}}">Edit</a>
      <a class="btn btn-danger" href="{{route('expensecategory.delete',$expensecat->id)}}">Delete</a>
    </td>

    </tr>

    @endforeach
  </tbody>


</table>

{{$expensecats->links()}}


@endsection
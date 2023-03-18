@extends('backend.master')
@section('content')
<h2 style="text-align:center">Expenses</h2>
<a href="{{route('expense.create')}}" class="btn btn-outline-primary text black">Add Expenses</a>

<table class="table table-primary table-striped ">
<thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Expense Category ID</th>
      <th scope="col">Volunteer ID</th>
      <th scope="col">Expense Title</th>
      <th scope="col">Details</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
    @foreach($expenses as $key=>$expense)
    <tr>
    <th scope="row">{{$key+1}}</th>
    <td scope="row">{{$expense->expense_category_id}}</td>
    <td scope="row">{{$expense->volunteer_id}}</td>
    <td scope="row">{{$expense->expense_title}}</td>
    <td scope="row">{{$expense->details}}</td>
    <td>
      <a class="btn btn-success" href="{{route('expense.view',$expense->id)}}">View</a>
      <a class="btn btn-primary" href="{{route('expense.edit',$expense->id)}}">Edit</a>
      <a class="btn btn-danger" href="{{route('expense.delete',$expense->id)}}">Delete</a>
    </td>

    </tr>

    @endforeach
  </tbody>


</table>

{{$expenses->links()}}


@endsection
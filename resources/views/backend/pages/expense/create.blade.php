@extends('backend.master')
@section('content')

<div style="padding:15px">
<h2 style="text-align:center">Expenses</h2>
<form action="{{route('expense.store')}}" method="post">

    @csrf
  <div class="form-group" >
    <label for="expense_category_id">Expense Category ID</label>
    <input required id="expense_category_id" type="text" class="form-control" name="expense_category_id">
    <label for="volunteer_id">Volunteer ID</label>
    <input required id="volunteer_id" type="text" class="form-control" name="volunteer_id">
    <label for="expense_title">Expense Title</label>
    <input required id="expense_title" type="text" class="form-control" name="expense_title">
    <label for="details">Details</label>
    <input required id="details" type="text" class="form-control" name="details">
    
  <button type="submit"  class="btn btn-primary">Submit</button>
</form>
</div>


@endsection
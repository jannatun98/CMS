@extends('backend.master')
@section('content')

<div style="padding:15px">
<h2 style="text-align:center">Expenses</h2>
<form action="{{route('expense.update',$expense->id)}}" method="post">
@method('put')

@if($errors->any())
        @foreach($errors->all() as $error)
          <p class="alert alert-danger">{{$error}}</p>
        @endforeach
    @endif

    @if(session()->has('message'))
    <p class="alert alert-success">{{session()->get('message')}}</p>
    @endif

    @csrf
  <div class="form-group" >
  <label for="crisis_id">Crisis Name</label>
    <select class="form-control" name="crisis_id" id="crisis_id" >
      @foreach($cris as $crisis)
      <option value="{{$crisis->id}}">{{$crisis->name}}</option>
      @endforeach
    </select>

  <label for="expense_category_id">Expense Category Name</label>
    <select class="form-control" name="expense_category_id" id="expense_category_id" >
      @foreach($expen as $ex)
      <option value="{{$ex->id}}">{{$ex->name}}</option>
      @endforeach
    </select>

    <label for="volunteer_id">Volunteer Name</label>
    <select class="form-control" name="volunteer_id" id="volunteer_id" >
      @foreach($volun as $vol)
      <option value="{{$vol->id}}">{{$vol->name}}</option>
      @endforeach
    </select>

    <label for="expense_title">Expense Title</label>
    <input required id="expense_title" value="{{$expense->expense_title}}" type="text" class="form-control" name="expense_title">
    <label for="details">Details</label>
    <input required id="details" value="{{$expense->details}}" type="text" class="form-control" name="details">
    
  <button type="submit"  class="btn btn-primary">Submit</button>
</form>
</div>


@endsection
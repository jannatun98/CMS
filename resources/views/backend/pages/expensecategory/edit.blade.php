@extends('backend.master')
@section('content')

<div style="padding:15px">
<h2 style="text-align:center">Expense Category</h2>
<form action="{{route('expensecategory.update',$expensecat->id)}}" method="post">
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
    <label for="name">Name</label>
    <input required id="name" value="{{$expensecat->name}}" type="text" class="form-control" name="name">
    <label for="status">Status</label>
    <input required id="status" value="{{$expensecat->status}}" type="text" class="form-control" name="status">
    <label for="description">Description</label>
    <input required id="description" value="{{$expensecat->description}}" type="text" class="form-control" name="description">
    
  <button type="submit"  class="btn btn-primary">Submit</button>
</form>
</div>


@endsection
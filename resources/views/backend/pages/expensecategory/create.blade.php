@extends('backend.master')
@section('content')

<div style="padding:15px">
<h2 style="text-align:center">Expense Category</h2>
<form action="{{route('expensecategory.store')}}" method="post">

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
    <input required id="name" type="text" class="form-control" name="name">
    <label for="status">Status</label>
    <input required id="status" type="text" class="form-control" name="status">
    <label for="description">Description</label>
    <input required id="description" type="text" class="form-control" name="description">
    
  <button type="submit"  class="btn btn-primary">Submit</button>
</form>
</div>


@endsection
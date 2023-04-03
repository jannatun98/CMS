@extends('backend.master')
@section('content')
<div style="padding:15px">
<h2 style="text-align:center">Crisis Types</h2>
<form action="{{route('crisistypes.store')}}" method="post">

@if($errors->any())
        @foreach($errors->all() as $error)
          <p class="alert alert-danger">{{$error}}</p>
        @endforeach
    @endif

    @if(session()->has('message'))
    <p class="alert alert-success">{{session()->get('message')}}</p>
    @endif


@csrf

<div class="form-group">
<label for="name">Type</label>
<input required id="name" type="text" class="form-control" name="name" placeholder="Enter type">
<label for="status">Select Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>


@endsection
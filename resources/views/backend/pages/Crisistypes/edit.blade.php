@extends('backend.master')
@section('content')
<div style="padding:15px">
<h2 style="text-align:center">Crisis Types</h2>
<form action="{{route('crisistypes.update',$critypes->id)}}" method="post">

@method('put')
@csrf

<div class="form-group">
<label for="name">Name</label>
<input required id="name" value="{{$critypes->name}}" type="text" class="form-control" name="name" placeholder="Enter name">
<label for="status">Select Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>


@endsection
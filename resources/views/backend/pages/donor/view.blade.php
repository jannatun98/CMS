@extends('backend.master')
@section('content')
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-4 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img  height="200px" width="200px" src="{{url('/uploads/'.$data->image)}}"></div>
        </div>
        <div class="col-md-8 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Donor</h4>
                </div>
                <div class="row mt-5">
                <div class="col-md-12"><label class="labels">Name</label><input type="text" class="form-control" value="{{$data->name}}"></div>
                <div class="col-md-12"><label class="labels">Email</label><input type="email" class="form-control" value="{{$data->email}}"></div>
                    <div class="col-md-12"><label class="labels">Address</label><input type="text" class="form-control" value="{{$data->address}}"></div>
                    <div class="col-md-12"><label class="labels">Age</label><input type="text" class="form-control" value="{{$data->age}}"></div>
                    <div class="col-md-12"><label class="labels">Gender</label><input type="text" class="form-control" value="{{$data->gender}}"></div>
                    <div class="col-md-12"><label class="labels">Phone</label><input type="text" class="form-control" value="{{$data->phone}}"></div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
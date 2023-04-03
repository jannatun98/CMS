@extends('backend.master')
@section('content')
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-4 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img  height="200px" width="200px" src="{{url('/uploads/'.$volunteer->image)}}"></div>
        </div>
        <div class="col-md-8 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Volunteer</h4>
                </div>
                <div class="row mt-5">
                <div class="col-md-12"><label class="labels">Name</label><input type="text" class="form-control" value="{{$volunteer->name}}"></div>
                    <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control" value="{{$volunteer->email}}"></div>
                    <div class="col-md-12"><label class="labels">Phone</label><input type="text" class="form-control" value="{{$volunteer->phone}}"></div>
                    <div class="col-md-12"><label class="labels">Address</label><input type="text" class="form-control" value="{{$volunteer->address}}"></div>                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
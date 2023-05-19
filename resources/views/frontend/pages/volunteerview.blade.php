@extends('frontend.master')
@section('content')
<div class="container mt-5">
    
    <div class="row d-flex justify-content-center">
        
        <div class="col-md-7">
            
            <div class="card p-3 py-4">
                
                <div class="text-center">
                    <img src="{{url('/uploads/'.$volun->image)}}" width="250" >
                </div>
                
                <div class="text-center mt-3">
                    <span class="bg-secondary p-1 px-4 rounded text-white">Volunteer</span>
                    <h5 class="mt-2 mb-0">{{$volun->name}}</h5>
                    <span>{{$volun->email}}</span>
                    <h6 class="mt-2 mb-0">{{$volun->phone}}</h6>
                </div>
                
               
                
                
            </div>
            
        </div>
        
    </div>
    
</div>
@endsection
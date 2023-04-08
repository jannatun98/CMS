@extends('frontend.master')
@section('content')
<div class="container mt-5">
    
    <div class="row d-flex justify-content-center">
        
        <div class="col-md-7">
            
            <div class="card p-3 py-4">
                
                <div class="text-center mt-3">
                    <span class="bg-secondary p-1 px-4 rounded text-white">Crisis Type</span>
                    <h5 class="mt-2 mb-0">{{$crisistypes->name}}</h5>
                    <h6 class="mt-2 mb-0">{{$crisistypes->status}}</h6>       
                </div>
                      
                
            </div>
            
        </div>
        
    </div>
    
</div>
@endsection
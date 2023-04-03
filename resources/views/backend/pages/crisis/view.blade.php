@extends('backend.master')
@section('content')

<div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
    <div class="card p-4">
        <div class=" image d-flex flex-column justify-content-center align-items-center"><img src="{{url('/uploads/'.$crisis->image)}}" alt="Image" style="width: 170px"><span class="name mt-3"><b>Crisis:</b> {{$crisis->name}}</span> <span class="idd"><b>Description:</b> {{$crisis->description}}</span>
            <div class="d-flex flex-row justify-content-center align-items-center gap-2"> <span class="idd1"><b>Location:</b> {{$crisis->Location->name}}</span> <span><img src="{{url('/backend/sticker/location.png')}}" style="width: 25px" ></span> </div>
            <div class="d-flex flex-row justify-content-center align-items-center mt-3"><span class="follow"><b>Amount Need:</b> {{$crisis->amount_need}}</span> </div>
            <div class="d-flex flex-row justify-content-center align-items-center mt-3"><span class="follow"><b>Amount Raised:</b> {{$crisis->amount_raised}}</span> </div>
            <div class="d-flex flex-row justify-content-center align-items-center mt-3"><span class="follow"><b>Crisis Type:</b> {{$crisis->Crisistypes->name}}</span> </div>
            <div class="d-flex flex-row justify-content-center align-items-center mt-3"><span class="follow"><b>From Date:</b> {{$crisis->from_date}}</span> </div>
            <div class="d-flex flex-row justify-content-center align-items-center mt-3"><span class="follow"><b>To Date:</b> {{$crisis->to_date}}</span> </div>
            <div class="d-flex flex-row justify-content-center align-items-center mt-3"><span class="follow"><b>Volunteer:</b> <a href="{{route('volunteer.view',$crisis->volunteer_id)}}"> {{$crisis->Volunteer->name}}</a></span> </div>
            
        </div>
    </div>
</div>
@endsection
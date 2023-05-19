@extends('backend.master')
@section('content')

<div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
    <div class="card p-4">
        <div class=" image d-flex flex-column justify-content-center align-items-center"><span class="name mt-3"><b>Crisis:</b> <a href="{{route('crisis.view',$volunteertocrisis->crisis_id)}}">{{$volunteertocrisis->Crisis->name}}</a></span>
            <div class="d-flex flex-row justify-content-center align-items-center gap-2"><span class="idd1"><b>Volunteer:</b> <a href="{{route('volunteer.view',$volunteertocrisis->volunteer_id)}}">{{$volunteertocrisis->User->name}}</a></span></div>
            
        </div>
    </div>
</div>
@endsection
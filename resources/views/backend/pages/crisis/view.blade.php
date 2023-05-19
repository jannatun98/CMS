@extends('backend.master')
@section('content')

<div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
    <div class="card p-4">
        <div class=" image d-flex flex-column justify-content-center align-items-center"><img src="{{url('/uploads/'.$crisis->image)}}" alt="Image" style="width: 170px"><span class="name mt-3"><b>Crisis:</b> {{$crisis->name}}</span> <span class="idd"><b>Description:</b> {{$crisis->description}}</span>
            <div class="d-flex flex-row justify-content-center align-items-center gap-2"> <span class="idd1"><b>Location:</b> {{$crisis->Location->name}}</span> <span><img src="{{url('/backend/sticker/location.png')}}" style="width: 25px"></span> </div>
            <div class="d-flex flex-row justify-content-center align-items-center mt-3"><span class="follow"><b>Amount Need:</b> {{$crisis->amount_need}}</span> </div>
            <div class="d-flex flex-row justify-content-center align-items-center mt-3"><span class="follow"><b>Amount Raised:</b> {{$crisis->amount_raised}}</span> </div>
            <div class="d-flex flex-row justify-content-center align-items-center mt-3"><span class="follow"><b>Crisis Type:</b> {{$crisis->Crisistypes->name}}</span> </div>
            <div class="d-flex flex-row justify-content-center align-items-center mt-3"><span class="follow"><b>From:</b> {{$crisis->from_date}}</span> </div>
            <div class="d-flex flex-row justify-content-center align-items-center mt-3"><span class="follow"><b>To:</b> {{$crisis->to_date}}</span> </div>


            <form action="{{route('crisis.volunteer',$crisis->id)}}" method="post">
                @csrf 
                <input type="hidden" name="crisis_id" value="{{$crisis->id}}">
            <label for="name"><b>Volunteer:</b></label>
            <select class="form-control" name="volunteer_id[]" id="volunteer_id" multiple>
                @foreach($volunteer as $volun)
                <option value="{{$volun->id}}">{{$volun->name}}</option>
                @endforeach
            </select>
            
<button class="btn btn-success" type="submit">Assign</button>
            </form>
           
        </div>
    </div>
</div>
@endsection
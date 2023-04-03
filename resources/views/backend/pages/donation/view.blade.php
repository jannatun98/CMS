@extends('backend.master')
@section('content')
    
<div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
    <div class="card p-4">
        <div class=" image d-flex flex-column justify-content-center align-items-center"><span class="name mt-3"><b>Crisis:</b> <a href="{{route('crisis.view',$donate->crisis_id)}}">{{$donate->Crisis->name}}</a></span>
            <div class="d-flex flex-row justify-content-center align-items-center gap-2"><span class="idd1"><b>Donor:</b> <a href="{{route('donor.view',$donate->donor_id)}}">{{$donate->Donor->name}}</a></span></div>
            <div class="d-flex flex-row justify-content-center align-items-center mt-3"><span class="follow"><b>Donate Amount:</b> {{$donate->donate_amount}}</span> </div>
            <div class="d-flex flex-row justify-content-center align-items-center mt-3"><span class="follow"><b>Payment Method:</b> {{$donate->payment_method}}</span> </div>
            <div class="d-flex flex-row justify-content-center align-items-center mt-3"><span class="follow"><b>Transaction ID:</b> {{$donate->transaction_id}}</span> </div>
        </div>
    </div>
</div>
@endsection
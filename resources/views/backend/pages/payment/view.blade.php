@extends('backend.master')
@section('content')

<div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
    <div class="card p-4">
        <div class=" image d-flex flex-column justify-content-center align-items-center"><span class="name mt-3"><b>Payment Method:</b> {{$pays->payment_method}}</span></div>
            <div class="d-flex flex-row justify-content-center align-items-center gap-2"><span class="idd1"><b>Payment Status:</b> {{$pays->payment_status}}</span></div>        
    </div>
</div>
@endsection
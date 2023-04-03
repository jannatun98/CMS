@extends('backend.master')
@section('content')

<div style="padding:15px">
<h2 style="text-align:center">Donation</h2>
<form action="{{route('donation.store')}}" method="post">
@if($errors->any())
        @foreach($errors->all() as $error)
          <p class="alert alert-danger">{{$error}}</p>
        @endforeach
    @endif

    @if(session()->has('message'))
    <p class="alert alert-success">{{session()->get('message')}}</p>
    @endif


    @csrf
  <div class="form-group" >
    <label for="crisis_id">Crisis Name</label>
    <select class="form-control" name="crisis_id" id="crisis_id" >
      @foreach($crisis as $do)
      <option value="{{$do->id}}">{{$do->name}}</option>
      @endforeach
    </select>

    <label for="donor_id">Donor Name</label>
    <select class="form-control" name="donor_id" id="donor_id" >
      @foreach($donor as $don)
      <option value="{{$don->id}}">{{$don->name}}</option>
      @endforeach
    </select>
    

    <label for="donate_amount">Donate Amount</label>
    <input required min="500" id="donate_amount" type="number" class="form-control" name="donate_amount">
    <label for="payment_method">Payment Method</label>
    <input required id="payment_method" type="text" class="form-control" name="payment_method">
    <label for="transaction_id">Transaction ID</label>
    <input required id="transaction_id" type="text" class="form-control" name="transaction_id">
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</div>


@endsection
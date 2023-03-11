@extends('backend.master')
@section('content')

<div style="padding:15px">
<h2 style="text-align:center">Donation</h2>
<form action="{{route('donation.store')}}" method="post">

    @csrf
  <div class="form-group" >
    <label for="crisis_id">Crisis ID</label>
    <input required id="crisis_id" type="text" class="form-control" name="crisis_id">
    <label for="donor_id">Donor ID</label>
    <input required id="donor_id" type="text" class="form-control" name="donor_id">
    <label for="donate_amount">Donate Amount</label>
    <input required id="donate_amount" type="number" class="form-control" name="donate_amount">
    <label for="payment_method">Payment Method</label>
    <input required id="payment_method" type="text" class="form-control" name="payment_method">
    <label for="transaction_id">Transaction ID</label>
    <input required id="transaction_id" type="text" class="form-control" name="transaction_id">
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</div>


@endsection
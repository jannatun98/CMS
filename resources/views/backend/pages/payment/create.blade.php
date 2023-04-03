@extends('backend.master')
@section('content')

<div style = "padding:15px">
<h2 style="text-align:center">Payment</h2>
<form  action="{{route('payment.store')}}" method="post">
@if($errors->any())
        @foreach($errors->all() as $error)
          <p class="alert alert-danger">{{$error}}</p>
        @endforeach
    @endif

    @if(session()->has('message'))
    <p class="alert alert-success">{{session()->get('message')}}</p>
    @endif

 @csrf
  <div class="form-group">
  <label for="payment_method">Payment Method</label>
                <select name="payment_method" id="payment_method" class="form-control">
                    <option value="Credit Card">Credit Card</option>
                    <option value="Paypal">Paypal</option>
                </select>
  </div>

  <div class="form-group">
  <label for="payment_status">Payment Status</label>
                <select name="payment_status" id="payment_status" class="form-control">
                    <option value="Pending">Pending</option>
                    <option value="Paypal">Paid</option>
                </select>
  </div>
  
<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

@endsection
@extends('frontend.master')
@section('content')

<div style="padding:15px">
  <div class="container mt-5">
    <div class="row d-flex justify-content-center">
      <div class="col-md-7">
        <div class="card p-3 py-4">
          <div class="text-center mt-3">
            <span class="rounded text-white">
              <h3><b>Donate Here!</b></h3>
            </span>

            <form action="{{route('user.donatenowsubmit',$crisis->id)}}" method="post">
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
                <label for="crisis_id"><b>Crisis Name</b></label>
                <input readonly type="text" class="form-control" name="crisis_id" value="{{$crisis->name}}">

                <label for="name"><b>Donor Name</b></label>
                <input readonly type="text" class="form-control" name="name" value="{{auth()->user()->name}}">


                <label for="donate_amount"><b>Donate Amount</b></label>
                <input required min="100" max="{{$crisis->amount_need-$crisis->amount_raised}}" id="donate_amount" type="number" class="form-control" name="donate_amount" placeholder="{{$crisis->amount_need-$crisis->amount_raised}} Tk to go">

                <label for="payment_method"><b>Payment Method</b></label>
                <select name="payment_method" id="payment_method" class="form-control">
                  <option value="Credit Card"><b>Credit Card</b></option>
                  <option value="Paypal"><b>Paypal</b></option>
                  <option value="Paypal"><b>bkash</b></option>
                </select>

                <label for="transaction_id"><b>Transaction ID</b></label>
                <input required id="transaction_id" type="text" class="form-control" name="transaction_id">
              </div>
              <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection
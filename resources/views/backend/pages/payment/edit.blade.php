@extends('backend.master')
@section('content')

<div style = "padding:15px">
<h2 style="text-align:center">Payment</h2>
<form  action="{{route('payment.update',$pay->id)}}" method="post">

    @method('put')

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
    <input required id="payment_method" value="{{$pay->payment_method}}" type="text" class="form-control" name="payment_method">
  </div>

  <div class="form-group">
    <label for="payment_status">Payment Status</label>
    <input required id="payment_status" value="{{$pay->payment_status}}" type="text" class="form-control" name="payment_status">
  </div>
  
<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

@endsection
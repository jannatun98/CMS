@extends('backend.master')
@section('content')
<h2 style="text-align:center">Payment Method</h2>
<a href="{{route('payment.create')}}" class="btn btn-outline-primary text-black">Add payment</a>
<table class="table  table-primary table-striped">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Payment Method</th>
      <th scope="col">Payment Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($payments as $key=>$payment)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$payment->payment_method}}</td>
      <td>{{$payment->payment_status}}</td>
      <td>
        <a class="btn btn-success" href="{{route('payment.view',$payment->id)}}">View</a>
        <a class="btn btn-primary" href="{{route('payment.edit',$payment->id)}}">Edit</a>
        <a class="btn btn-danger" href="{{route('payment.delete',$payment->id)}}">Delete</a>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>

{{$payments->links()}}

@endsection
@extends('backend.master')

@section('content')
<div style="padding:15px">
<h2 style="text-align:center">Donation</h2>
<!-- <a href="{{route('donation.create')}}" class="btn btn-outline-primary text-black">Add Donation</a> -->

<table class="table table-primary table-striped">
  
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Crisis Name</th>
      <th scope="col">Donor Name</th>
      <th scope="col">Donate Amount</th>
      <th scope="col">Payment Method</th>
      <th scope="col">Transaction ID</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
  @foreach($donation as $key=>$donate)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$donate->Crisis->name}}</td>
      <td>{{$donate->name}}</td>
      <td>{{$donate->donate_amount}}</td>
      <td>{{$donate->payment_method}}</td>
      <td>{{$donate->transaction_id}}</td>
      <td>
        <a class="btn btn-success" href="{{route('donation.view',$donate->id)}}">View</a>
        <!-- <a class="btn btn-primary" href="{{route('donation.edit',$donate->id)}}">Edit</a> -->
        <!-- <a class="btn btn-danger" href="{{route('donation.delete',$donate->id)}}">Delete</a> -->

      </td>

    </tr>
    @endforeach
  </tbody>
  
</table>
{{$donation->links()}}
</div>

@endsection
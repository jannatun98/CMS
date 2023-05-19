@extends('backend.master')

@section('content')

<div style="padding:15px">
<h2 style="text-align:center">Donation Report</h2>

<form action="{{route('donation.report.search')}}" method="get">

    <div class="row">
        <div class="col-md-4">
            <label for=""><b>From date:</b></label>
            <input name="from_date" type="date" class="form-control">

        </div>
        <div class="col-md-4">
            <label for=""><b>To date:</b></label>
            <input name="to_date" type="date" class="form-control">
        </div>
        <div class="col-md-4">
            <button type="submit" class="btn btn-success">Search</button>
        </div>
    </div>

</form>

<br>
<br>
<div id="donationReport">

    <h2 style="text-align:center">Donation Reports- {{date('Y-m-d')}}</h2>
    <table class="table table-primary table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Crisis Name</th>
                <th scope="col">Donor Name</th>
                <th scope="col">Donate Amount</th>
                <th scope="col">Payment Method</th>
                <th scope="col">Transaction ID</th>

            </tr>
        </thead>
        <tbody>
            @if(isset($donations))
            @foreach($donations as $key=>$donate)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$donate->Crisis->name}}</td>
                <td>{{$donate->name}}</td>
                <td>{{$donate->donate_amount}}</td>
                <td>{{$donate->payment_method}}</td>
                <td>{{$donate->transaction_id}}</td>

            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>
<button onclick="printDiv('donationReport')" class="btn btn-success">Print</button>
</div>

<script>
    function printDiv(divId) {
        var printContents = document.getElementById(divId).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
@endsection
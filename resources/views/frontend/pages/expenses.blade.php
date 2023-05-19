@extends('frontend.master')
@section('content')

<div style="padding:15px">
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-7">
                <div class="card p-3 py-4">
                    <div class="text-center mt-3">
                        <span class="rounded text-white">
                            <h3><b>{{__('Add Expenses')}}</b></h3>
                        </span>

                        <form class="table-secondary text-dark mt-2 mb-0" action="{{route('volunteer.expenseformsubmit')}}" method="post">
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
                                <select class="form-control" name="crisis_id" id="crisis_id">
                                    @foreach($cris as $crisis)
                                    <option value="{{$crisis->id}}">{{$crisis->name}}</option>
                                    @endforeach
                                </select>

                                <label for="expense_category_id"><b>Expense Category Name</b></label>
                                <select class="form-control" name="expense_category_id" id="expense_category_id">
                                    @foreach($expen as $ex)
                                    <option value="{{$ex->id}}">{{$ex->name}}</option>
                                    @endforeach
                                </select>

                                <label for="name"><b>Volunteer Name</b></label>
                                <input readonly type="text" class="form-control" name="name" value="{{auth()->user()->name}}">

                                <label for="expense_title"><b>Expense Title</b></label>
                                <input required id="expense_title" type="text" class="form-control" name="expense_title">
                                <label for="amount"><b>Amount</b></label>
                                <input required id="amount" type="number" class="form-control" name="amount">
                                <label for="details"><b>Details</b></label>
                                <input required id="details" type="text" class="form-control" name="details">

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
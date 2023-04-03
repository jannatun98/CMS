@extends('backend.master')
@section('content')

<div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
    <div class="card p-4">
        <div class=" image d-flex flex-column justify-content-center align-items-center"><span class=""><b>Crisis:</b> <a href="{{route('crisis.view',$expense->crisis_id)}}">{{$expense->Crisis->name}}</a></span>
            <div class=" image d-flex flex-column justify-content-center align-items-center"><span class="idd1"><b>Expense Category:</b> <a href="{{route('expensecategory.view',$expense->expense_category_id)}}">{{$expense->ExpenseCategory->name}}</a></span></div>
            <div class="d-flex flex-row justify-content-center align-items-center gap-2"><span class="idd1"><b>Volunteer:</b> <a href="{{route('volunteer.view',$expense->volunteer_id)}}">{{$expense->Volunteer->name}}</a></span></div>
            <div class="d-flex flex-row justify-content-center align-items-center gap-2"><span class="idd1"><b>Expense Title:</b> {{$expense->expense_title}}</span></div>
            <div class="d-flex flex-row justify-content-center align-items-center gap-2"><span class="idd1"><b>Details:</b> {{$expense->details}}</span></div>

        </div>
    </div>
</div>
@endsection
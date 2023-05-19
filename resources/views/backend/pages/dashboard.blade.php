@extends('backend.master')

@section('content')
<div style="padding:15px">
    <h4 style="text-align:center">Crowdfunding Management System</h4><br>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-secondary text-white mb-4">
                <div class="card-body">Total Crises</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <div class="text">
                        {{$totalcrisis}} 
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-secondary text-white mb-4">
                <div class="card-body">Total Volunteers</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <div class="text">
                        {{$totalvol}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
        <div class="card bg-secondary text-white mb-4">
                <div class="card-body">Total Donors</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <div class="text">
                        {{$totaldonor}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
        <div class="card bg-secondary text-white mb-4">
                <div class="card-body">Total Donations</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <div class="text">
                        {{$totaldon}} Donors donated.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
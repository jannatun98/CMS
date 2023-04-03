@extends('backend.master')
@section('content')
<div class="page-content page-container" id="page-content">
    <div class="padding">
    <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
                                      <div class="col-xl-6 col-md-12">
                                                <div class="card user-card-full">
                                                    <div class="row m-l-0 m-r-0">
                                                        <div class="col-sm-1 bg-c-lite-green user-profile">
                                                            <div class="card-block text-center text-white">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-11">
                                                            <div class="card-block">
                                                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600"><b>Crisis Type:</b> {{$crisistypes->name}}</h6>
                                                                <div class="row">
                                                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600"><b>Status:</b> {{$crisistypes->status}}</h6> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             </div>
                                                </div>
                                            </div>

@endsection
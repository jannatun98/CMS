@extends('frontend.master')
@section('content')
<div class="container mt-5">

    <div class="row d-flex justify-content-center">

        <div class="col-md-7">

            <div class="card p-3 py-4">


                <div class="text-center mt-3">
                    <span class="rounded text-white"><h3><b>{{__('Volunteer To Crisis')}}</b></h3></span>

                    <table class="table table-dark table-striped mt-2 mb-0">

                        <thead>
                            <tr>
                                <th scope="col">{{__('Crisis')}}</th>
                                <th scope="col">{{__('Volunteer Name')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($voluntocrisis as $voluntocri)
                            <tr>
                                <td>{{$voluntocri->Crisis->name}}</td>
                                <td>{{$voluntocri->User->name}}</td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>




            </div>

        </div>

    </div>

</div>
@endsection
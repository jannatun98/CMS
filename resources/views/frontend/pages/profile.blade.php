@extends('frontend.master')
@section('content')
<form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
   
        <div class="col-md-4 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="{{url('/uploads/'.$user->image)}}"><span class="font-weight-bold">
                <input type="file" name="image">
                
            </span><span class="text-black-50"></span><span> </span>
            </div>
        </div>
        <div class="col-md-8 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right"><b>Profile</b></h4>
                </div>
               

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
                    <div class="row mt-2">
                        <div class="col-md-12"><label class="labels">Name</label>
                            <input name="name" type="text" class="form-control" placeholder="Name" value="{{auth()->user()->name}}">
                        </div>

                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Address</label><input name="address" type="text" class="form-control" placeholder="Enter address" value="{{auth()->user()->address}}"></div>
                    </div>
                    <div class="row mt-3">
                        <div required class="col-md-12"><label class="labels">Date of Birth</label><input name="date_of_birth" type="text" class="form-control" placeholder="Enter your date of birth" value="{{auth()->user()->date_of_birth}}"></div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label for="gender">Select Gender</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Phone Number</label><input name="phone" type="tel" class="form-control" placeholder="Enter your phone number" value="{{auth()->user()->phone}}"></div>
                    </div>

                    <div class="mt-5 text-center">
                        <button class="btn btn-primary profile-button" type="submit">Update Profile</button>
                    </div>
              

            </div>
        </div>
      

    </div>
</div>
</form>
@endsection
@extends('frontend.master')
@section('content')


<!-- Sign up Modal -->
<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title w-100 font-weight-bold text-center">{{__('SIGN UP')}}</h4>
			</div>

			<form action="{{route('user.signup')}}" method="POST">
				@if($errors->any())
				@foreach($errors->all() as $error)
				<p class="alert alert-danger">{{$error}}</p>
				@endforeach
				@endif

				@if(session()->has('message'))
				<p class="alert alert-success">{{session()->get('message')}}</p>
				@endif
				<div class="modal-body">

					<!-- form -->
					@csrf
					<label for="name"></label>
					<input required name="name" type="text" class="form-control" id="name" placeholder="{{__('Your Name')}}">
					<label for="email"></label>
					<input required name="email" type="email" class="form-control" id="email" placeholder="{{__('Your Email')}}">
					<label for="password"></label>
					<input required name="password" type="password" class="form-control" id="password" placeholder="{{__('Password')}}">
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-secondary">{{__('Submit')}}</button>
				</div>
			</form>
		</div>
	</div>
</div>



<!-- Login Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title w-100 font-weight-bold text-center">{{__('LOG IN')}}</h4>
			</div>
			<form action="{{route('user.login')}}" method="POST">
				@if($errors->any())
				@foreach($errors->all() as $error)
				<p class="alert alert-danger">{{$error}}</p>
				@endforeach
				@endif

				@if(session()->has('message'))
				<p class="alert alert-success">{{session()->get('message')}}</p>
				@endif
				<div class="modal-body">

					<!-- form -->
					@csrf
					<label for="email"></label>
					<input required name="email" type="email" class="form-control" id="email" placeholder="{{__('Your Email')}}">
					<label for="password"></label>
					<input required name="password" type="password" class="form-control" id="password" placeholder="{{__('Password')}}">

				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-secondary">{{__('Submit')}}</button>
				</div>
			</form>
		</div>
	</div>
</div>



<!-- Volunteer Sign up -->
<div class="modal fade" id="volunteersignup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title w-100 font-weight-bold text-center">{{__('SIGN UP AS VOLUNTEER')}}</h4>
			</div>

			<form action="{{route('volunteer.signup')}}" method="POST">
				@if($errors->any())
				@foreach($errors->all() as $error)
				<p class="alert alert-danger">{{$error}}</p>
				@endforeach
				@endif

				@if(session()->has('message'))
				<p class="alert alert-success">{{session()->get('message')}}</p>
				@endif
				<div class="modal-body">

					<!-- form -->
					@csrf
					<label for="name"></label>
					<input required name="name" type="text" class="form-control" id="name" placeholder="{{__('Your Name')}}">
					<label for="address"></label>
					<input required name="address" type="text" class="form-control" id="address" placeholder="{{__('Your Address')}}">
					<label for="email"></label>
					<input required name="email" type="email" class="form-control" id="email" placeholder="{{__('Your Email')}}">
					<label for="phone"></label>
					<input required digits="11" name="phone" type="tel" class="form-control" id="phone" placeholder="{{__('Phone Number')}}">
					<label for="password"></label>
					<input required name="password" type="password" class="form-control" id="password" placeholder="{{__('Password')}}">
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-secondary">{{__('Submit')}}</button>
				</div>
			</form>
		</div>
	</div>
</div>



<section class="hero-wrap js-fullheight">
	<div class="home-slider js-fullheight owl-carousel">
		<div class="slider-item js-fullheight" style="background-image:url(frontend/images/bg_1.jpg);">
			<div class="overlay-1"></div>
			<div class="overlay-2"></div>
			<div class="overlay-3"></div>
			<div class="overlay-4"></div>
			<div class="container">
				<div class="row no-gutters slider-text js-fullheight align-items-center">
					<div class="col-md-10 col-lg-7 ftco-animate">
						<div class="text w-100">
							<h2>{{__('Help the needy in need')}}</h2>
							<h1 class="mb-3">{{__('Lend the helping hand get involved')}}</h1>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="slider-item js-fullheight" style="background-image:url(frontend/images/bg_2.jpg);">
			<div class="overlay-1"></div>
			<div class="overlay-2"></div>
			<div class="overlay-3"></div>
			<div class="overlay-4"></div>
			<div class="container">
				<div class="row no-gutters slider-text js-fullheight align-items-center">
					<div class="col-md-10 col-lg-7 ftco-animate">
						<div class="text w-100">
							<h2>{{__('Raising Hope')}}</h2>
							<h1 class="mb-3">{{__('Your help')}},{{__('their hope')}}</h1>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="slider-item js-fullheight" style="background-image:url(frontend/images/bg_3.jpg);">
			<div class="overlay-1"></div>
			<div class="overlay-2"></div>
			<div class="overlay-3"></div>
			<div class="overlay-4"></div>
			<div class="container">
				<div class="row no-gutters slider-text js-fullheight align-items-center">
					<div class="col-md-10 col-lg-7 ftco-animate">
						<div class="text w-100">
							<h2>{{__('Raising Hope')}}</h2>
							<h1 class="mb-3">{{__('Giving Hope to the Homeless People')}}</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="ftco-appointment ftco-section ftco-no-pt ftco-no-pb img">

	<div class="overlay"></div>
	<div class="container">
		<!-- Crisis -->


		<div class="mt-4">
			<div class="row">
				@foreach($cri as $crisis)
				<div class="col-md-3">
					<div class="card" style="width: 20rem;">
						<img class="card-img-top" src="{{url('/uploads/'.$crisis->image)}}" height="250px" alt="Card image cap">
						<div class="card-body">
							<h4 class="card-title">{{$crisis->name}}</h4>
							<p class="card-text">{{$crisis->description}}</p>
							<p class="card-text"><b>Location:</b>{{$crisis->Location->name}}</a></p>
							<p class="card-text"><b>Amount Need:</b> {{$crisis->amount_need}} Tk</p>
							<p class="card-text"><b>Amount Raised:</b> {{$crisis->amount_raised}} Tk</p>
							<p class="card-text"><b>Crisis Type:</b><a href="{{route('user.crisistypes',$crisis->crisistype_id)}}"> {{$crisis->Crisistypes->name}}</a></p>
							<p class="card-text"><b>From:</b> {{$crisis->from_date}}</p>
							<p class="card-text"><b>To:</b> {{$crisis->to_date}}</p>

							@if($crisis->amount_need > $crisis->amount_raised)
							<a href="{{route('user.donatenowform',$crisis->id)}}" class="btn btn-primary">Donate now</a>
							@endif
							<!-- 
							@if($crisis->from_date = $crisis->to_date)
							<a href="{{route('user.donatenowform',$crisis->id)}}" class="btn btn-primary">Donate now</a>
							@endif -->
						</div>
					</div>
				</div>

				@endforeach
			</div>










			<div class="row">
				<div class="col-md-7 wrap-about py-5">
					<div class="heading-section pr-md-5 pt-md-5">
						<h2 class="mb-4">{{__('We are here to help everyone in need')}}</h2>
					</div>
					<div class="row my-md-5">
						<div class="col-md-6 d-flex counter-wrap">
							<div class="block-18 d-flex">
								<div class="icon d-flex align-items-center justify-content-center">
									<span class="flaticon-volunteer"></span>
								</div>
								<div class="desc">
									<div class="text">
										<strong class="number" data-number="{{$totalvol}}">0</strong>
									</div>
									<div class="text">
										<span>{{__('Volunteers')}}</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 d-flex counter-wrap">
							<div class="block-18 d-flex">
								<div class="icon d-flex align-items-center justify-content-center">
									<span class="flaticon-piggy-bank"></span>
								</div>
								<div class="desc">
									<div class="text">
										<strong class="number" data-number="{{$totaldon}}">0</strong>
									</div>
									<div class="text">
										<span>{{__('Donors')}}</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					@auth
					@else
					<p><a href="" class="btn btn-secondary btn-outline-secondary" data-toggle="modal" data-target="#volunteersignup">{{__('Become A Volunteer')}}</a></p>
					@endauth
				</div>
			</div>
		</div>
</section>


<section class="ftco-section ftco-no-pt">
	<div class="container">
		<div class="row justify-content-center pb-5 mb-3">
			<div class="col-md-7 heading-section text-center ftco-animate">
				<span class="subheading">{{__('Volunteer')}}</span>
				<h2>{{__('Our Volunteers')}}</h2>
			</div>
		</div>
		<div class="row">
			@foreach($volunteer as $vol)
			<div class="col-md-6 col-lg-3">
				<div class="volunteer">
					<div><img width="255px" height="250px" src="{{url('/uploads/'.$vol->image)}}"></div><br><br>
					<a href="{{route('user.volunteer',$vol->id)}}">
						<div class="text text-4">
							<h3>{{$vol->name}}</h3>
							<span>Volunteer</span>
						</div>
					</a>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>

<section class="ftco-hireme bg-secondary">
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-md-8 col-lg-8 d-flex align-items-center">
				<div class="w-100">
					<h2>{{__('Best Way to Make a Difference in the Lives of Others')}}</h2>
				</div>
			</div>
			@auth
			@else
			<div class="col-md-4 col-lg-4 d-flex align-items-center justify-content-end">
				<p class="mb-0"><a href="#" class="btn btn-primary py-3 px-4" data-toggle="modal" data-target="#volunteersignup">{{__('Become A Volunteer')}}</a></p>
			</div>
			@endauth
		</div>
	</div>
</section>

@endsection
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
							<p class="card-text"><b>Location:</b> <a href="{{route('user.location',$crisis->id)}}">{{$crisis->Location->name}}</a></p>
							<p class="card-text"><b>Amount Need:</b> {{$crisis->amount_need}}</p>
							<p class="card-text"><b>Amount Raised:</b> {{$crisis->amount_raised}}</p>
							<p class="card-text"><b>Crisis Type:</b><a href="{{route('user.crisistypes',$crisis->id)}}"> {{$crisis->Crisistypes->name}}</a></p>
							<p class="card-text"><b>From:</b> {{$crisis->from_date}}</p>
							<p class="card-text"><b>To:</b> {{$crisis->to_date}}</p>
							<p class="card-text"><b>Volunteer:</b> <a href="{{route('user.volunteer',$crisis->id)}}">{{$crisis->Volunteer->name}}</a></p>
							<a href="{{route('user.donatenowform')}}" class="btn btn-primary">Donate now</a>
						</div>
					</div>
				</div>
				
				@endforeach
			</div>










			<div class="row">
				<div class="col-md-7 wrap-about py-5">
					<div class="heading-section pr-md-5 pt-md-5">
						<span class="subheading">Welcome to unicare</span>
						<h2 class="mb-4">We are here to help everyone in need</h2>
						<p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their.</p>
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
										<strong class="number" data-number="24400">0</strong>
									</div>
									<div class="text">
										<span>Trusted Funds</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<p><a href="" class="btn btn-secondary btn-outline-secondary" data-toggle="modal" data-target="#volunteersignup">{{__('Become A Volunteer')}}</a></p>
				</div>
			</div>
		</div>
</section>


<section class="ftco-section ftco-no-pb">
	<div class="container">
		<div class="row justify-content-center pb-5 mb-3">
			<div class="col-md-7 heading-section text-center ftco-animate">
				<span class="subheading">Our Causes</span>
				<h2>Donate to charity causes around the world</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-lg-3">
				<div class="causes causes-2 text-center ftco-animate">
					<a href="#" class="img w-100" style="background-image: url(frontend/images/causes-1.jpg);"></a>
					<div class="text p-3">
						<h2><a href="#">Save the poor children from hunger</a></h2>
						<p>Far far away, behind the word mountains, far from the countries Vokalia</p>
						<div class="goal mb-4">
							<p><span>$3,800</span> to go</p>
							<div class="progress" style="height:20px">
								<div class="progress-bar progress-bar-striped" style="width:70%; height:20px">70%</div>
							</div>
						</div>
						<p><a href="#" class="btn btn-light w-100">Donate Now</a></p>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-3">
				<div class="causes causes-2 text-center ftco-animate">
					<a href="#" class="img w-100" style="background-image: url(frontend/images/causes-2.jpg);"></a>
					<div class="text p-3">
						<h2><a href="#">Save the poor children from hunger</a></h2>
						<p>Far far away, behind the word mountains, far from the countries Vokalia</p>
						<div class="goal mb-4">
							<p><span>$3,800</span> to go</p>
							<div class="progress" style="height:20px">
								<div class="progress-bar progress-bar-striped" style="width:82%; height:20px">82%</div>
							</div>
						</div>
						<p><a href="#" class="btn btn-light w-100">Donate Now</a></p>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-3">
				<div class="causes causes-2 text-center ftco-animate">
					<a href="#" class="img w-100" style="background-image: url(frontend/images/causes-3.jpg);"></a>
					<div class="text p-3">
						<h2><a href="#">Save the poor children from hunger</a></h2>
						<p>Far far away, behind the word mountains, far from the countries Vokalia</p>
						<div class="goal mb-4">
							<p><span>$3,800</span> to go</p>
							<div class="progress" style="height:20px">
								<div class="progress-bar progress-bar-striped" style="width:95%; height:20px">95%</div>
							</div>
						</div>
						<p><a href="#" class="btn btn-light w-100">Donate Now</a></p>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-3">
				<div class="causes causes-2 text-center ftco-animate">
					<a href="#" class="img w-100" style="background-image: url(frontend/images/causes-4.jpg);"></a>
					<div class="text p-3">
						<h2><a href="#">Save the poor children from hunger</a></h2>
						<p>Far far away, behind the word mountains, far from the countries Vokalia</p>
						<div class="goal mb-4">
							<p><span>$3,800</span> to go</p>
							<div class="progress" style="height:20px">
								<div class="progress-bar progress-bar-striped" style="width:75%; height:20px">75%</div>
							</div>
						</div>
						<p><a href="#" class="btn btn-light w-100">Donate Now</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-counter" id="section-counter">
	<div class="container">
		<div class="row">
			<div class="col-md-3 mb-5 mb-md-0 text-center text-md-left">
				<h2 class="font-weight-bold" style="color: #fff; font-size: 22px;">We're on a mission to help all your problems</h2>
				<a href="#" class="btn btn-white btn-outline-white">Donate Now</a>
			</div>
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
							<div class="text">
								<strong class="number" data-number="88984">0</strong>
							</div>
							<div class="text">
								<span>Donation Campaigns are running</span>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
							<div class="text">
								<strong class="number" data-number="65000">0</strong>
							</div>
							<div class="text">
								<span>Professional and kind volunteers</span>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
							<div class="text">
								<strong class="number" data-number="77000">0</strong>
							</div>
							<div class="text">
								<span>Funds we raised till now on site</span>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
							<div class="text">
								<strong class="number" data-number="50">0</strong>
							</div>
							<div class="text">
								<span>Dedicated Donors</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section testimony-section">
	<div class="overlay"></div>
	<div class="container">
		<div class="row justify-content-center pb-5">
			<div class="col-md-7 heading-section heading-section-white text-center ftco-animate">
				<span class="subheading">Testimony</span>
				<h2>Happy Clients &amp; Feedbacks</h2>
			</div>
		</div>
		<div class="row ftco-animate">
			<div class="col-md-12">
				<div class="carousel-testimony owl-carousel">
					<div class="item">
						<div class="testimony-wrap d-flex">
							<div class="user-img" style="background-image: url(frontend/images/person_1.jpg)">
							</div>
							<div class="text pl-4">
								<span class="quote d-flex align-items-center justify-content-center">
									<i class="fa fa-quote-left"></i>
								</span>
								<p class="rate">
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
								</p>
								<p>Far far away, behind the word mountains, far from the countries Vokalia</p>
								<p class="name">Racky Henderson</p>
								<span class="position">Father</span>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="testimony-wrap d-flex">
							<div class="user-img" style="background-image: url(frontend/images/person_2.jpg)">
							</div>
							<div class="text pl-4">
								<span class="quote d-flex align-items-center justify-content-center">
									<i class="fa fa-quote-left"></i>
								</span>
								<p class="rate">
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
								</p>
								<p>Far far away, behind the word mountains, far from the countries Vokalia</p>
								<p class="name">Henry Dee</p>
								<span class="position">Businesswoman</span>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="testimony-wrap d-flex">
							<div class="user-img" style="background-image: url(frontend/images/person_3.jpg)">
							</div>
							<div class="text pl-4">
								<span class="quote d-flex align-items-center justify-content-center">
									<i class="fa fa-quote-left"></i>
								</span>
								<p class="rate">
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
								</p>
								<p>Far far away, behind the word mountains, far from the countries Vokalia</p>
								<p class="name">Mark Huff</p>
								<span class="position">Businesswoman</span>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="testimony-wrap d-flex">
							<div class="user-img" style="background-image: url(frontend/images/person_4.jpg)">
							</div>
							<div class="text pl-4">
								<span class="quote d-flex align-items-center justify-content-center">
									<i class="fa fa-quote-left"></i>
								</span>
								<p class="rate">
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
								</p>
								<p>Far far away, behind the word mountains, far from the countries Vokalia</p>
								<p class="name">Benjie Busk Jr.</p>
								<span class="position">Businesswoman</span>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="testimony-wrap d-flex">
							<div class="user-img" style="background-image: url(frontend/images/person_1.jpg)">
							</div>
							<div class="text pl-4">
								<span class="quote d-flex align-items-center justify-content-center">
									<i class="fa fa-quote-left"></i>
								</span>
								<p class="rate">
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
								</p>
								<p>Far far away, behind the word mountains, far from the countries Vokalia</p>
								<p class="name">Ken Bosh</p>
								<span class="position">Businesswoman</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center pb-5 mb-3">
			<div class="col-md-7 heading-section text-center ftco-animate">
				<span class="subheading">Our Blog</span>
				<h2>Latest news from our blog</h2>
			</div>
		</div>
		<div class="row d-flex">
			<div class="col-md-6 col-lg-3 d-flex ftco-animate">
				<div class="blog-entry align-self-stretch">
					<a href="blog-single.html" class="block-20" style="background-image: url('frontend/images/image_1.jpg');">
					</a>
					<div class="text p-4">
						<div class="meta mb-2">
							<div><a href="#">July 20, 2020</a></div>
							<div><a href="#">Admin</a></div>
							<div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> 3</a></div>
						</div>
						<h3 class="heading"><a href="#">Foods &amp; Water Need in Africa</a></h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
						<p><a href="#" class="btn btn-secondary">Read more</a></p>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-3 d-flex ftco-animate">
				<div class="blog-entry align-self-stretch">
					<a href="blog-single.html" class="block-20" style="background-image: url('frontend/images/image_2.jpg');">
					</a>
					<div class="text p-4">
						<div class="meta mb-2">
							<div><a href="#">July 20, 2020</a></div>
							<div><a href="#">Admin</a></div>
							<div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> 3</a></div>
						</div>
						<h3 class="heading"><a href="#">Foods &amp; Water Need in Africa</a></h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
						<p><a href="#" class="btn btn-secondary">Read more</a></p>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-3 d-flex ftco-animate">
				<div class="blog-entry align-self-stretch">
					<a href="blog-single.html" class="block-20" style="background-image: url('frontend/images/image_3.jpg');">
					</a>
					<div class="text p-4">
						<div class="meta mb-2">
							<div><a href="#">July 20, 2020</a></div>
							<div><a href="#">Admin</a></div>
							<div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> 3</a></div>
						</div>
						<h3 class="heading"><a href="#">Foods &amp; Water Need in Africa</a></h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
						<p><a href="#" class="btn btn-secondary">Read more</a></p>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-3 d-flex ftco-animate">
				<div class="blog-entry align-self-stretch">
					<a href="blog-single.html" class="block-20" style="background-image: url('frontend/images/image_4.jpg');">
					</a>
					<div class="text p-4">
						<div class="meta mb-2">
							<div><a href="#">July 20, 2020</a></div>
							<div><a href="#">Admin</a></div>
							<div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> 3</a></div>
						</div>
						<h3 class="heading"><a href="#">Foods &amp; Water Need in Africa</a></h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
						<p><a href="#" class="btn btn-secondary">Read more</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="ftco-section ftco-no-pt">
	<div class="container">
		<div class="row justify-content-center pb-5 mb-3">
			<div class="col-md-7 heading-section text-center ftco-animate">
				<span class="subheading">Volunteer</span>
				<h2>Our Expert Volunteer</h2>
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
					<h2>Best Way to Make a Difference in the Lives of Others</h2>
				</div>
			</div>
			<div class="col-md-4 col-lg-4 d-flex align-items-center justify-content-end">
				<p class="mb-0"><a href="#" class="btn btn-primary py-3 px-4">Become A Volunteer</a></p>
			</div>
		</div>
	</div>
</section>

@endsection
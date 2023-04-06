<div class="wrap">
	<div class="container">
		<div class="row">
			<div class="col-md-6 d-flex align-items-center">
				<p class="mb-0 phone pl-md-2">
					<a href="#" class="mr-2"><span class="fa fa-phone mr-1"></span>01974896984</a>
					<a href="#"><span class="fa fa-paper-plane mr-1"></span>mitu@gmail.com</a>
				</p>
			</div>
			<div class="col-md-6 d-flex justify-content-md-end">
				<div class="social-media">
					<p class="mb-0 d-flex">
						<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
						<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
						<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
						<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-dribbble"><i class="sr-only">Dribbble</i></span></a>
					</p>
				</div>
				<select class="d-flex align-items-center justify-content-center" class="form-control" name="language" id="" onchange="location = this.value;">
					<option @if(session()->get('language')=='en') selected @endif value="{{route('switch.language','en')}}">EN</option>
					<option @if(session()->get('language')=='bn') selected @endif value="{{route('switch.language','bn')}}">BN</option>
					<option @if(session()->get('language')=='ko') selected @endif value="{{route('switch.language','ko')}}">KO</option>
				</select>
			</div>
		</div>
	</div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	<div class="container">
		<a class="navbar-brand" href="index.html">Unicare</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="oi oi-menu"></span> Menu
		</button>
		
		@auth

		<a class="btn btn-light">
			{{auth()->user()->name}}</a>
		<a href="{{route('user.logout')}}" class="nav-item nav-link">Logout</a>
		@else
		<button type="submit" class="btn btn-light" data-toggle="modal" data-target="#signup">{{__('SIGN UP')}}</button>
		<a href="" class="btn btn-light" data-toggle="modal" data-target="#login">{{__('LOG IN')}}</a>
		@endauth



		

		<div class="collapse navbar-collapse" id="ftco-nav">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active"><a href="" class="nav-link">{{__('Home')}}</a></li>
				<li class="nav-item"><a href="" class="nav-link">{{__('About')}}</a></li>
				<li class="nav-item"><a href="" class="nav-link">{{__('Crisis Types')}}</a></li>
				<li class="nav-item"><a href="" class="nav-link">{{__('Volunteer To Crisis')}}</a></li>
				<li class="nav-item"><a href="" class="nav-link">{{__('Expense')}}</a></li>
				<li class="nav-item"><a href="" class="nav-link">{{__('Donation')}}</a></li>
			</ul>



		</div>
	</div>
</nav>
@section('extra-script')
<script src="{{ asset('js/jquery-2.0.0.min.js')}}" type="text/javascript"></script>
@endsection
@extends('layouts.app')
@section('title','inscription')
@section('content')

<section class="section-content padding-y" style="min-height:84vh;">
<!-- JESUS CHRIST -->
<!-- ============================ COMPONENT REGISTER   ================================= -->
	<div class="card mx-auto" style="max-width: 400px; margin-top:60px;">
		<article class="card-body" style="-webkit-box-shadow: 0px 0px 2px 0px rgba(0,0,0,0.75);
			-moz-box-shadow: 0px 0px 2px 0px rgba(0,0,0,0.75);
			box-shadow: 0px 0px 2px 0px rgba(0,0,0,0.75);">
		<header class="mb-4"><h4 class="card-title">Creer un compte</h4></header>
		<form method="POST" action="{{ route('register') }}">
			@csrf
				<div class="form-row">
					<div class="col form-group">
						<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="nom">
						@error('name')
								<span class="invalid-feedback" role="alert">
									<strong>veillez entrez un nom valide</strong>
								</span>
						@enderror
					</div> <!-- form-group end.// -->
					<div class="col form-group">
						<input placeholder="prenom" id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom" autofocus>

							@error('prenom')
								<span class="invalid-feedback" role="alert">
									<strong>veillez entrez un prenom valide</strong>
								</span>
							@enderror
					</div> <!-- form-group end.// -->
				</div> <!-- form-row end.// -->
				<div class="form-group">
					<input placeholder="email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
						@error('email')
							<span class="invalid-feedback" role="alert">
								<strong>@php if($message=="validation.unique"){echo "ce mail est deja utilisé";}
									else{echo "entrez un mail valide";} @endphp</strong>
							</span>
						@enderror
				</div> <!-- form-group end.// -->
				<div class="form-row">
					<div class="form-group col-md-6">
						<input placeholder="mot de passe" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

							@error('password')
								<span class="invalid-feedback" role="alert">
									<strong>@php if($message=="validation.confirmed"){echo "mot de passe differents";}
									else{echo "mot de passe trop court";} @endphp</strong>
								</span>
							@enderror
					</div> <!-- form-group end.// --> 
					<div class="form-group col-md-6">
						<input placeholder="confirmer mot de passe" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
					</div> <!-- form-group end.// -->  
				</div>
				<div class="form-group">
					<button  style="background-color: #002687;border:none" type="submit" class="btn btn-primary btn-block"> Enregistrer </button>
				</div> <!--     
				<div class="form-group"> 
					<label class="custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input" checked=""> <div class="custom-control-label"> I am agree with <a href="#">terms and contitions</a>  </div> </label>
				</div> form-group end.// -->           
			</form>
			<div class="row">
				<div class="col"><hr></div>
				<div class="col-auto">OU</div>
				<div class="col"><hr></div>
			</div>
			<a href="{{ url('/auth/redirect/facebook') }}" class="btn btn-facebook btn-block mb-2"> <i class="fab fa-facebook-f"></i> &nbsp  S'inscrire avec Facebook</a>
			<a href="{{ url('/auth/redirect/google') }}" class="btn btn-instagram btn-block mb-4"> <i class="fab fa-google"></i> &nbsp  S'inscrire avec Google</a>

		</article><!-- card-body.// -->
	</div> <!-- card .// -->
	
	<p class="text-center mt-4">Vous avez un compte? <a href="{{url('/login')}}" style="font-weight:bold;color: #002687;">Se connecter</a></p>
	<br><br>

</section>


@stop
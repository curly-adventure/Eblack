@section('extra-script')
<script src="{{ asset('js/jquery-2.0.0.min.js')}}" type="text/javascript"></script>
@endsection
@extends('layouts.app')
@section('title','connexion')
@section('content')

<section class="section-conten padding-y" style="min-height:84vh">

	<!-- ============================ COMPONENT LOGIN   ================================= -->
		<div class="card mx-auto" style="max-width: 350px; margin-top:60px;">
		  <div class="card-body" style="-webkit-box-shadow: 0px 0px 2px 0px rgba(0,0,0,0.75);
		  -moz-box-shadow: 0px 0px 2px 0px rgba(0,0,0,0.75);
		  box-shadow: 0px 0px 2px 0px rgba(0,0,0,0.75);">
		  <h4 class="card-title mb-4">se Connecter</h4>
		  <form method="POST" action="{{ route('login') }}">
			{{--@if(url()->previous() === route('panier.index'))
			<div class="col s12">
			  <div class="card purple darken-3">
				<div class="card-content white-text center-align">
				  Vous devez être connecté pour passer une commande, si vous n'avez pas encore de compte vous pouvez en créer un en utilisant le lien sous ce formulaire.
				</div>
			  </div>
			</div>
		  @endif--}}
            @csrf
			  <div class="form-group">
				 
				 <input placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

				 @error('email')
					 <span class="invalid-feedback" role="alert">
						 <strong>@php if($message=="auth.failed"){echo "mot de passe ou email incorrect";}
							else{echo "";} @endphp</strong>
					 </span>
				 @enderror
				</div> <!-- form-group// -->
			  <div class="form-group">
				
				<input placeholder="Mot de passe" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
					 @error('password')
                        <span class="invalid-feedback" role="alert">
                        <strong>mot de passe incorrect</strong>
                     </span>
                    @enderror
			</div> <!-- form-group// -->
			  
							  
			  <div class="form-group">
				<input class="form-check-input mt-3 ml-1" style="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
				<label style="" class="form-check-label mt-2 ml-4" for="remember">se souvenir </label>
                
                @if (Route::has('password.request'))
                <a class="btn btn-link float-right" style="color:red;" href="{{ route('password.request') }}">
                    {{ __('mot de passe oublié?') }}
                </a> @endif
			  </div> <!-- form-group form-check .// -->
			  <div class="form-group">
				  <button style="background-color: #002687; border:none" type="submit" class="btn btn-primary btn-block"> SE CONNECTER </button>
                    
				</div> <!-- form-group// -->    
          </form>
          <div class="row">
            <div class="col"><hr></div>
            <div class="col-auto">OU</div>
            <div class="col"><hr></div>
        </div>
        <a href="{{ url('/auth/redirect/facebook') }}" class="btn btn-facebook btn-block mb-2"> <i class="fab fa-facebook-f"></i> &nbsp  se connecter avec Facebook</a>
        <a href="{{ url('/auth/redirect/google') }}" class="btn btn-instagram btn-block mb-4"> <i class="fab fa-google"></i> &nbsp  se connecter avec Google</a>

		  </div> <!-- card-body.// -->
		</div> <!-- card .// -->
	
		 <p class="text-center mt-4">aucun compte ? <a href="{{url('/register')}}" style="font-weight:bold;color: #002687;">S'inscrire</a></p>
		 <br><br>
	<!-- ============================ COMPONENT LOGIN  END.// ================================= -->
	</section>

@stop
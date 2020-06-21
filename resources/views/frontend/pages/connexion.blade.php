@extends('frontend.app')
@section('title','connexion')
@section('content')

<section class="section-conten padding-y" style="min-height:84vh">

	<!-- ============================ COMPONENT LOGIN   ================================= -->
		<div class="card mx-auto" style="max-width: 350px; margin-top:60px;">
		  <div class="card-body" style="-webkit-box-shadow: 0px 0px 2px 0px rgba(0,0,0,0.75);
		  -moz-box-shadow: 0px 0px 2px 0px rgba(0,0,0,0.75);
		  box-shadow: 0px 0px 2px 0px rgba(0,0,0,0.75);">
		  <h4 class="card-title mb-4">Se connecter</h4>
		  <form method="POST" action="{{ route('login') }}">
			@csrf
				<a href="#" class="btn btn-facebook btn-block mb-2"> <i class="fab fa-facebook-f"></i> &nbsp  Se connecter avec Facebook</a>
				<a href="#" class="btn btn-instagram btn-block mb-4"> <i class="fab fa-google"></i> &nbsp  Se connecter avec Google</a>
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
                        <strong>{{ $message }}</strong>
                     </span>
                    @enderror
			</div> <!-- form-group// -->
			  
							  
			  <div class="form-group">
				<input class="form-check-input" style="margin-left:5px" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> <span>se souvenir de moi</span>
				<label class="form-check-label" for="remember">se souvenir de moi</label>
				<a href="#" class="float-right" style="color:red;">mot de passe oublié?</a> 
	
			  </div> <!-- form-group form-check .// -->
			  <div class="form-group">
				  <button style="background-color: #002687;" type="submit" class="btn btn-primary btn-block"> VALIDER </button>
				  @if (Route::has('password.request'))
				  <a class="btn btn-link" href="{{ route('password.request') }}">
					  {{ __('Forgot Your Password?') }}
				  </a>
			  @endif
				</div> <!-- form-group// -->    
		  </form>
		  </div> <!-- card-body.// -->
		</div> <!-- card .// -->
	
		 <p class="text-center mt-4">aucun compte ? <a href="{{url('/register')}}" style="font-weight:bold;color: #002687;">S'inscrire</a></p>
		 <br><br>
	<!-- ============================ COMPONENT LOGIN  END.// ================================= -->
	
	
	</section>

@stop
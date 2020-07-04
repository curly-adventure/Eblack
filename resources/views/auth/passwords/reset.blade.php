@extends('layouts.app')
@section('title','renitialisation du mot de passe')
@section('content')

<section class="section-content padding-y" style="min-height:84vh;">
<!-- JESUS CHRIST -->
<!-- ============================ COMPONENT REGISTER   ================================= -->
	<div class="card mx-auto" style="max-width: 400px; margin-top:60px;">
		<article class="card-body" style="-webkit-box-shadow: 0px 0px 2px 0px rgba(0,0,0,0.75);
			-moz-box-shadow: 0px 0px 2px 0px rgba(0,0,0,0.75);
			box-shadow: 0px 0px 2px 0px rgba(0,0,0,0.75);">
		<header class="mb-4"><h4 class="card-title">rénitialisation</h4></header>
		<form method="POST" action="{{ route('password.update') }}">
			@csrf
            <input type="hidden" name="token" value="{{ $token }}">
				<div class="form-group">
					<input placeholder="email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
						@error('email')
							<span class="invalid-feedback" role="alert">
								<strong>email incorrect</strong>
							</span>
						@enderror
				</div> <!-- form-group end.// -->
				<div class="form-group ">
                    <input placeholder="nouveau mot de passe" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>@php if($message=="validation.confirmed"){echo "mot de passe differents";}
                            else{echo "erreur !";} @endphp</strong>
                        </span>
                    @enderror
				</div> <!-- form-group end.// --> 
				<div class="form-group">
						<input placeholder="confirmer mot de passe" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div> <!-- form-group end.// -->  
				
				<div class="form-group mt-5">
					<button  style="background-color: #002687;border:none" type="submit" class="btn btn-primary btn-block"> RENITIALISER </button>
				</div>     
				          
			</form>
			
		</article><!-- card-body.// -->
	</div> 
</section>
@endsection

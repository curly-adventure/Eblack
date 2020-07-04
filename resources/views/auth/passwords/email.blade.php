@extends('layouts.app')

@section('content')

<section class="section-conten padding-y" style="min-height:84vh">

	<!-- ============================ COMPONENT LOGIN   ================================= -->
		<div class="card mx-auto" style="max-width: 350px; margin-top:60px;">
		  <div class="card-body" style="-webkit-box-shadow: 0px 0px 2px 0px rgba(0,0,0,0.75);
		  -moz-box-shadow: 0px 0px 2px 0px rgba(0,0,0,0.75);
          box-shadow: 0px 0px 2px 0px rgba(0,0,0,0.75);">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
              {{ session('status') }}
          </div>
            @endif
		  <h4 class="card-title mb-4">rénitialisation mot de passe</h4>
		  <form method="POST" action="{{ route('password.email') }}" class="mt-5">
            @csrf
			<div class="form-group">				 
				
                <input id="email" type="email" placeholder="entrez votre email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>@php if("$message"=="passwords.user"){echo "email incorrect"; } 
                                else {echo "$message" ; } @endphp</strong>
                    </span>
                @enderror
            </div>
							  
			  
			<div class="form-group mt-5 mb-2">
				  <button style="background-color: #002687; border:none" type="submit" class="btn btn-primary btn-block"> ENVOYER </button>
                    
			</div> <!-- form-group// -->    
          </form>
          
		  </div> <!-- card-body.// -->
		</div> <!-- card .// -->
	
	</section>
  
@endsection

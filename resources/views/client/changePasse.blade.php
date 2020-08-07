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
		  <h4 class="card-title mb-4">changer votre mot de passe</h4>
		  <form method="POST" action="{{ route('client.change.password') }}">
            @csrf
			  <div class="form-group">				 
				<input id="current_password" type="password" placeholder="mot de passe actuel" class="form-control" name="current_password" required autocomplete="current-password">
				
			</div> <!-- form-group// -->
			  <div class="form-group">
				<input placeholder="nouveau mot de passe" id="new_password" type="password" class="form-control " name="new_password" required autocomplete="current-password">
			
			</div> <!-- form-group// -->
			<div class="form-group">
				<input placeholder="confirmer le nouveau mot de passe" id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" required autocomplete="new-password">
			</div>
							  
			  
			  <div class="form-group">
				  <button style="background-color: #002687; border:none" type="submit" class="btn btn-primary btn-block"> SAUVER </button>
                    
				</div> <!-- form-group// -->    
          </form>
          
		  </div> <!-- card-body.// -->
		</div> <!-- card .// -->
	
	</section>
	@include('sweetalert::alert')
@stop

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
		  <form>
				<a href="#" class="btn btn-facebook btn-block mb-2"> <i class="fab fa-facebook-f"></i> &nbsp  Se connecter avec Facebook</a>
				<a href="#" class="btn btn-instagram btn-block mb-4"> <i class="fab fa-google"></i> &nbsp  Se connecter avec Google</a>
			  <div class="form-group">
				 <input name="" class="form-control" placeholder="E-mail" type="text">
			  </div> <!-- form-group// -->
			  <div class="form-group">
				<input name="" class="form-control" placeholder="Mot de passe" type="password">
			  </div> <!-- form-group// -->
			  
			  <div class="form-group">
				  <a href="#" class="float-right" style="color:red;">mot de passe oublié?</a> 
				
			  </div> <!-- form-group form-check .// -->
			  <div class="form-group">
				  <button style="background-color: #002687;" type="submit" class="btn btn-primary btn-block"> VALIDER </button>
			  </div> <!-- form-group// -->    
		  </form>
		  </div> <!-- card-body.// -->
		</div> <!-- card .// -->
	
		 <p class="text-center mt-4">aucun compte ? <a href="{{url('/inscription')}}" style="font-weight:bold;color: #002687;">S'inscrire</a></p>
		 <br><br>
	<!-- ============================ COMPONENT LOGIN  END.// ================================= -->
	
	
	</section>

@stop
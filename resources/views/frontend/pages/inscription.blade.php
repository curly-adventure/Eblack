@extends('frontend.app')
@section('title','inscription')
@section('content')

<section class="section-content padding-y" style="min-height:84vh;">

	<!-- ============================ COMPONENT REGISTER   ================================= -->
		<div class="card mx-auto" style="max-width: 400px; margin-top:60px;">
		  <article class="card-body" style="-webkit-box-shadow: 0px 0px 2px 0px rgba(0,0,0,0.75);
		  -moz-box-shadow: 0px 0px 2px 0px rgba(0,0,0,0.75);
		  box-shadow: 0px 0px 2px 0px rgba(0,0,0,0.75);">
			<header class="mb-4"><h4 class="card-title">Creer un compte</h4></header>
			<form>
					<div class="form-row">
						<div class="col form-group">
							<!--<label>First name</label>-->
							  <input type="text" class="form-control" placeholder="Nom">
						</div> <!-- form-group end.// -->
						<div class="col form-group">
							
							  <input type="text" class="form-control" placeholder="Prenom">
						</div> <!-- form-group end.// -->
					</div> <!-- form-row end.// -->
					<div class="form-group">
						
						<input type="email" class="form-control" placeholder="Email">
						
					</div> <!-- form-group end.// -->
					
					
					<div class="form-row">
						<div class="form-group col-md-6">
							
							<input class="form-control" type="password" placeholder="Mot de passe">
						</div> <!-- form-group end.// --> 
						<div class="form-group col-md-6">
							
							<input class="form-control" type="password" placeholder="repeter mot de passe">
						</div> <!-- form-group end.// -->  
					</div>
					<div class="form-group">
						<button  style="background-color: #002687;" type="submit" class="btn btn-primary btn-block"> Enregistrer </button>
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
				<a href="#" class="btn btn-facebook btn-block mb-2"> <i class="fab fa-facebook-f"></i> &nbsp  S'inscrire avec Facebook</a>
				<a href="#" class="btn btn-instagram btn-block mb-4"> <i class="fab fa-google"></i> &nbsp  S'inscrire avec Google</a>

			</article><!-- card-body.// -->
		</div> <!-- card .// -->
		
		<p class="text-center mt-4">Vous avez un compte? <a href="{{url('/connexion')}}" style="font-weight:bold;color: #002687;">Se connecter</a></p>
		<br><br>
	<!-- ============================ COMPONENT REGISTER  END.// ================================= -->
	
	</section>


@stop
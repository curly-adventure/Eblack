@extends('layouts.app')
@section('title','contact')
@section('extra-meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('extra-css')
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/animsition.min.css')}}">
	
	<link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
<!--===============================================================================================-->
@endsection
@section('content')

	<div class="container-contact100" >
		<div class="wrap-contact100" style=" margin-top:80px;">
			<form class="contact100-form validate-form" >
				<span class="contact100-form-title">
					Contactez-Nous
				</span>

				<div class="wrap-input100 validate-input bg1" data-validate="Entrez votre Nom svp">
					<span class="label-input100">NOM COMPLET *</span>
					<input class="input100" type="text" name="name" placeholder="Entre votre nom">
				</div>

				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Entrez votre Email (e@a.x)">
					<span class="label-input100">Email *</span>
					<input class="input100" type="text" name="email" placeholder="Entre votre Email ">
				</div>

				<div class="wrap-input100 bg1 rs1-wrap-input100">
					<span class="label-input100">TELEPHONE</span>
					<input class="input100" type="text" name="phone" placeholder="Enter votre Numero">
				</div>

				

				<div class="wrap-input100 validate-input bg0 rs1-alert-validate" data-validate = "Entrez votre Message SVP">
					<span class="label-input100">Message</span>
					<textarea class="input100" name="message" placeholder="Entrez votre message içi..."></textarea>
				</div>

				
					<input id="submit" class="col-12" type="submit" value="Envoyé">
				
                <style>
                    #submit{
                        background-color:transparent;
                        padding: 10px;
                        border: 1px solid #002687;
                        border-radius:15px;
                        cursor:pointer;
                        font-size:20px;
                        font-weight:bold;
                    }
                    #submit:hover{
                        background:#002687;
                        color:white;
                    }
                </style>
			</form>
		</div>
	</div>

@endsection
@section('extra-js')

<!--===============================================================================================-->
	<script src="{{asset('js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{asset('js/main.js')}}"></script>
@endsection
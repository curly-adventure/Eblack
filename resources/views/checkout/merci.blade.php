@section('extra-script')
<script src="{{ asset('js/jquery-2.0.0.min.js')}}" type="text/javascript"></script>
@endsection
@extends('layouts/app')
@section('title','thank you')
@section('content')
<section class="section-content bg padding-y border-top" style="padding-top: 80px;">

    <div class="col-md-12">
  
        <div class="jumbotron text-center" style="background: white">
            <img src="{{asset('images/icons/ok.jpg')}}" class="float-left" width="250" alt="">
            <h4 class="display-5">Merci pour votre confiance!</h4>
            <p class="lead" style="color:#002687"><strong>commande n°{{ $num}}</strong></p>
            <hr>
            
            <p style="font-weight: bold;">
                votre commande a été prise en compte, nous vous enverons un message de confirmation par mail
            </p>
            <br>
            <div class="r">
                <a href="{{route('produits.index')}}" class="btn btn-light mb-2" style="font-weight:bold;font-size:18px;border:1px solid #002687;background:white"> <i class="fa fa-chevron-left" style="color: #002687"></i> &nbsp;Continuer vos achats </a>
                <a href="{{route('client.commandes')}}" class="btn btn-light mb-2"style="font-weight:bold;font-size:18px;border:1px solid #002687;background:white" > Voir vos commandes &nbsp;<i class="fa fa-chevron-right" style="color: #002687"></i> </a>        
            </div>
            <br>
            <p>
                Vous rencontrez un problème? <a href="#">Nous contacter</a>
            </p>
            <p class="lead">
                
            </p>
        </div>
    </div>
</section>
@endsection
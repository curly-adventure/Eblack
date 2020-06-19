@extends('frontend/app')
@section('title','thank you')
@section('content')
<section class="section-content bg padding-y border-top" style="padding-top: 80px;">

    <div class="col-md-12">
        <div class="jumbotron text-center">
            <h2 class="display-3">Merci pour votre confiance!</h2>
            <p class="lead"><strong>Votre commande a été traitée avec succès</strong></p>
            <hr>
            <p>
                Vous rencontrez un problème? <a href="#">Nous contacter</a>
            </p>
            <p class="lead">
                <a class="btn btn-primary btn-sm" href="{{ route('produits.index') }}" style="background-color:#002687" role="button">Continuer vers la boutique</a>
            </p>
        </div>
    </div>
</section>
@endsection
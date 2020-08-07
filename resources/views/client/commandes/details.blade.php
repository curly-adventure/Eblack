@section('extra-script')
<script src="{{ asset('js/jquery-2.0.0.min.js')}}" type="text/javascript"></script>
@endsection
@extends('layouts.app')
@section('title','vos commandes')
@section('content')

<section class="section-content  bg padding-y border-top" >
  <div class="container" style=" margin-top:80px;">
    <div class="row">
        @include('client.menu')
      <div class="col-lg-8 offset-lg-1">
          <div class="card p-lg-3" >
            <p class="float-left" style="font-size: 25px;font-weight:bold"><a href="{{route('client.commandes')}}" class="fas fa-arrow-left " style="color: #002687"></a> details commande</p>
            <div class="card-body" >
                <div style="border:1px solid black;padding:8px;font-weight:bold;">
                    <span style="color: #002687;font-size:20px;">Commande n° {{$commande->num_achat}}</span> <br>
                    @if (!$commande->canceled)
                    <a href="{{route('client.commande.supprimer',$commande->id)}}" class="float-right btn btn-outline-light mr-2 d-none d-lg-block" style="color: #002687;border:1px solid #002687">annuler la commande</a>
                    @endif
                    <span style="">{{$nbre_article}} articles</span> <br>
                    <span>montant : {{$commande->montant}} Fcfa</span> <br>
                    <span>date : {{$commande->created_at}}</span> <br>
                    <span><a href="{{route('client.commande.supprimer',$commande->id)}}" class=" btn btn-outline-light mr-2 d-lg-none " style="color: #002687;border:1px solid #002687">annuler la commande</a></span>
                </div>
                <div class="card mt-3">
                    <div class="card-header" style="color:#002687;background:white; font-weight:bold;font-size:20px;"> Articles commandés</div>
                    <div class="card-body">
                        @foreach ($articles as $article)
                            <div class="row border-bottom p-2">
                                <figure class="media ">
                                    @php
                                        $liens=\App\Produits::where('id',$article->produit_id)->first()->images;
                                        $lien=json_decode($liens); @endphp
                                    <div class="img-wrap"><img src="{{asset('storage/'.$lien[0])}}"  style="border:none" class="img-thumbnail img-sm"></div>
                                </figure>
                                <div class="ml-2">
                                    <span style="font-weight: bold;font-size:17px"> {{$article->nom}}</span> <br>
                                    <span>quantité : {{$article->quantite}}</span> <br>
                                    <span> prix : {{$article->prix}} Fcfa</span> <br>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="row ml-1">
                    <div class="card mt-3 col-11 col-lg-5">
                        <div class="card-header" style="color:#002687;background:white; font-weight:bold;font-size:20px;"> Paiement </div>
                        <div class="card-body">
                            <strong>Méthode de Paiement : </strong>
                            <p>{{$commande->methode_paiement}}</p>
                            <strong>Montant : </strong>
                            <p>{{getprice($commande->montant)}} Fcfa</p>
                        </div>
                    </div>
                    <div class="card mt-3 ml-lg-4 col-11 col-lg-6">
                        <div class="card-header" style="color:#002687;background:white; font-weight:bold;font-size:20px;"> Detail adresse <a href="{{route('client.editer_adresse')}}" class="float-right" style="color: #002687"><i class="fas fa-edit"></i></a></div>
                        <div class="card-body">
                           <p> {{$adresse_client->description}}</p>
                            <p>{{$commune_client}}, {{$ville_client}}</p>
                        </div>
                    </div>
                </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</section>

@include('sweetalert::alert')
@endsection

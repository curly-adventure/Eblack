@section('extra-script')
<script src="{{ asset('js/jquery-2.0.0.min.js')}}" type="text/javascript"></script>
@endsection
@extends('layouts.app')
@section('title','vos commandes')
@section('content')
@if ($commande and count($commande)>0)
<section class="section-content d-lg-block bg padding-y border-top" >
  <div class="container" style=" margin-top:80px;">
    <div class="row">
        @include('client.menu')
      <div class="col-lg-8 offset-lg-1">
          <div class="card p-lg-3" >
            <p class="float-left" style="font-size: 25px;font-weight:bold"><i class="fas fa-shopping-basket "> </i> Vos Commandes</p>
            <div class="card-body">
              @foreach ($commande as $item)
                  @php
                      //$nbre_prduit = count(App\AchatProduit::all()->where('achat_id',$item->id));
                      $status=App\StatusCommande::where('id',$item->status_id)->first();
                  @endphp
              <div class="card mb-5 " style="border:2px solid #002687">
                <div class="card-header"style="color:#002687;background:white; font-weight:bold" >COMMANDE N° {{$item->num_achat}} <i class="float-right d-none d-lg-block">{{$item->created_at}}</i> </div>
                <div class="card-body">
                  <div class="mb-2">
                    <span style="font-weight: bold">nombre d'article: </span>
                    <span style=""> {{$item->quantite}} </span>
                  </div>
                  <div class="mb-2">
                    <span style="font-weight: bold">montant : </span>
                    <span>{{getprice($item->montant)}} Fcfa</span>
                  </div>
                  <div class="mb-2">
                    <span style="font-weight: bold">status : </span>
                    @php
                    switch($status->id){
                      case 1 : $nom= "En attente de confirmation";$color='rgb(58, 230, 59)'; break;
                      case 2 : $nom= "En cour de traitement";$color="orange";break;
                      case 3 : $nom= "Commande Livrer";$color="#002687";break;
                      case 4 : $nom= "Commande annuler";$color="red";break;
                    }
                @endphp
                    <span style="color:{{$color}};font-weight:bold">{{$nom}}</span>
                  </div>
                  <div class="mb-1 d-lg-none">
                    <span style="font-weight: bold">date : </span>
                    <span >{{$item->created_at}}</span>
                  </div>
                </div>
                <div class="card-footer" style="color:#002687;background:white">  <a href="{{route('client.commande.details',"$item->id")}}" style="color:#002687;font-weight:bold"><i class="fas fa-edit"></i> DETAIL DE LA COMMANDE</a></div>
              </div>
              @endforeach
            </div>
          </div>
      </div>
    </div>
  </div>
</section>
@else
    <section class="section-content bg padding-y border-top" >
        <div class="container" style=" margin-top:80px;">
          <div class="row">
          @include('client.menu')
          <div class="col-lg-8 offset">
          <a href="{{route('home')}}" class="d-lg-none" style="color:#002687;font-size:18px"><span><i class="fa fa-arrow-left float-left mt-2"></i></span></a>
          <center><p class="h5"style="color: #888;font-weight:bold;font-size:20px"><i class="fas fa-shopping-basket "> </i> Vos Commandes</p></center><br> 

            <center><p class="h3"style="font-weight:bold;">AUCUNE COMMANDE</p><br>
                <small>içi s'afficheras vos commandes</small>
                <div class="col-md-6 mt-4 ">
                    <a href="{{route('produits.index')}}" class="btn btn-success btn-lg btn-block" type="button" style="background-color: #002687;color: white;border:none">passez aux achats !</a>
                </div>
            </center>
        </div>
          </div>
      </div>
    </section>
    @endif
@include('sweetalert::alert')
@endsection

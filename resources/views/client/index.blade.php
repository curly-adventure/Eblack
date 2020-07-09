@extends('layouts.app')
@section('title')
    mon compte
@endsection
@section('content')

<section class="section-content d-none d-lg-block bg padding-y border-top" >
  <div class="container" style=" margin-top:80px;">
    <div class="row">
        @include('client.menu')
      <div class="col-8 offset-1">
          <div class="card p-3">
            <p style="font-size: 20px;font-weight:bold">Votre Compte</p>
            <div class="card-body">
            <div class="row ">
              <aside class="col-6">
                
                <div class="card mb-5" style="max-width:25rem;">
                  <div class="card-header"style="color:white;background:#002687;" >INFORMATIONS PERSONNELLES <i class="fas fa-info float-right"></i> </div>
                  <div class="card-body">
                    <div class="mb-2">
                      <span style="font-weight: bold">Nom : </span>
                      <span> {{$client->nom }}</span>
                    </div>
                    <div class="mb-2">
                      <span style="font-weight: bold">Prenom : </span>
                      <span>{{$client->prenom }}</span>
                    </div>
                    <div class="mb-2">
                      <span style="font-weight: bold">Numero : </span>
                      <span>{{$client->numero==null ?"aucun" : $client->numero}}</span>
                    </div>
                    <div class="mb-2">
                      <span style="font-weight: bold">Email : </span>
                      <span>{{$client->email }}</span>
                    </div>
                  </div>
                <div class="card-footer"><a href="{{route('client.editer_info')}}" style="color:#002687;font-weight:bold"><i class="fas fa-edit"></i> MODIFIER</a></div>
                </div> <!-- card.// -->
               </aside>
               <aside class="col-6">
                
                <div class="card mb-5" style="max-width:25rem;">
                  <div class="card-header"style="color:white;background:#002687;" >ADRESSE <i class="fas fa-info float-right"></i> </div>
                  <div class="card-body">
                    <div class="mb-2">
                      <span style="font-weight: bold">Ville : </span>
                      <span> {{$ville==null ? "non renseigné" :$ville}}</span>
                    </div>
                    <div class="mb-2">
                      <span style="font-weight: bold">Commune : </span>
                      <span> {{$commune==null ?"non renseigné" :$commune}}</span>
                    </div>
                    
                    <div class="mb-2">
                      <span style="font-weight: bold">detail Adresse : </span>
                      <span>{{$adresse==null ?"aucun" : $adresse->description}}</span>
                    </div>
                  </div>
                  <div class="card-footer" style="color:#002687">  <a href="{{route('client.editer_adresse')}}" style="color:#002687;font-weight:bold"><i class="fas fa-edit"></i> MODIFIER</a></div>
                </div> <!-- card.// -->
               </aside>
            </div>
          </div>
          <div><a href="{{route('produits.index')}}" class="btn" style="color : #002687;font-size:20px"><i class="fa fa-arrow-left"></i> continuer ses achats</a></div>
          </div>
      </div>
    </div>
      </div>
</section>
<section class="section-content d-lg-none d-block bg padding-y border-top" >
  <div class="container" style=" margin-top:80px;">
    <div class="row" style="color: white;background:#002687">
      <div class="container m-2 p-2">
        <a href="{{route('client.editer_info')}}" class="float-right" style="font-size: 20px;color:white"><i class="fas fa-edit" ></i></a>
        <span class="">{{ $client->nom }} {{ $client->prenom }}</span> <br>
         <span>{{ $client->email }}</span>
      </div>
    </div>
    <div class="card mt-2 d-block d-lg-none">
      <div class="card-body">
        <button id="button">
          <a href="{{route('client.commandes')}}" class=""><i class="fas fa-shopping-basket mr-4" ></i>Vos commandes</a>
        </button>  
        <button id="button">
          <a href="{{route('wishlist.show')}}"><i class="fas fa-heart mr-4" ></i>Vos favoris</a>
        </button> 
        <button id="button">
          <a href="{{route('client.editer_adresse')}}"><i class="fas fa-map-marker-alt mr-4" ></i>Votre Adresse</a>
        </button> <hr>
        <button id="button">
          <a href="{{route('client.change_passe')}}" style="font-size: 18px; color:#002687;">modifier votre mot de passe</a>
        </button> <hr>
        <button id="button">
          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-power-off mr-4"></i> deconnexion</a>
        </button>
      </div>
    </div>
    <div class="mt-3">
    <a href="{{route('produits.index')}}" class="btn" style="color : #002687;font-size:20px"><i class="fa fa-arrow-left"></i> continuer ses achats</a>
  </div>
  </div>
</section>
@include('sweetalert::alert')
@endsection

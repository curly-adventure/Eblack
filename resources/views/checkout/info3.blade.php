@extends('layouts.app')
@section('title','paiement')
@section('extra-meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')

<section class="section-content bg padding-y" style="min-height:84vh">
    <div class="container" style=" margin-top:100px;max-width: 1000px;">
        <center><p style="color: #888;font-weight:bold;">FINALISATION DE LA COMMANDE</p></center><br>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link disabled" id="adresse-tab" data-toggle="tab" href="#adresse" role="tab" aria-controls="adresse" aria-selected="true" style="color: #002687;font-weight: bold;cursor:not-allowed">Adresse</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" id="livraison-tab" data-toggle="tab" href="#livraison" role="tab" aria-controls="Livraison" aria-selected="false" style="color: #002687;font-weight: bold;cursor:not-allowed" >Livraison</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" id="paiement-tab" data-toggle="tab" href="#paiement" role="tab" aria-controls="paiement" aria-selected="false" style="color: #002687;font-weight: bold;">Paiement</a>
            </li>
        </ul>
        <div class="col-4 d-none d-lg-block float-right">
            <div class="card" style="border: none;">
                <header class="card-header">
                    <h4 class="card-title mt-2">Votre Commande</h4>
                </header>
                <article class="card-body" style="-webkit-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
                    -moz-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
                    box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);max-height: 35vh;
                    overflow-y: auto;" >
                    @foreach (Cart::content() as $produit)
                <div class="">
                    <div class="float-left mb-4" style="width: 70%;">
                        <span class="word-limit " >{{$produit->model->nom}}</span> <br>
                        <span class="h6 price-new">{{getprice($produit->model->prix_vente)}} Fcfa</span>
                        <p>Qté : {{$produit->qty}}</p>
                    </div>
                    @php $liens=$produit->model->images; $lien=json_decode($liens); @endphp
                    <img class="img-sm float-right mb-2" style="width: 30%;" src="{{asset('storage/'.$lien[0])}}">
                  
                </div>
                
                @endforeach
                </article>
            </article>
                <article class="card-body" style="-webkit-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
                -moz-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
                box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);">
                <div class="float-left" style="color:black;">Sous-total : </div> 
                <div class="float-right">{{getprice(Cart::subtotal())}} Fcfa</div>
                <br>
                <hr>
                <div  class="float-left" style="font-weight: bold;">Total : </div> 
                <div class="float-right h6 price-new" >{{getprice(Cart::subtotal())}} Fcfa</div>
                </article>
            </div>
         
            
        </div>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="paiement" role="tabpanel" aria-labelledby="paiement-tab">
                <div class="card" style="margin-top:20px">
                    <header class="card-header">
                        <h4 class="card-title mt-2">3. &nbsp;Mode de paiement</h4>
                    </header>
                    <article class="card-body">
                        <p style="font-weight: bold;">Quel moyen de paiement voulez-vous utiliser ?</p><br>
                        <form action="{{route('paiement.store.methodepaie')}}" id="form-3" method="POST">
                        @csrf
                        <div style="padding-left: 20px;" class="form-group ">
                            <input style="color: #002687;font-size: 20px;"class="form-check-input" type="radio" name="surplace" value="option1" checked>
                            <span style="font-weight: bold;"class="form-check-label"> Paiement à la livraison</span>
                        </div>
                        <hr>
                        <div style="padding-left: 20px;" class="form-group ">
                            <input class="form-check-input" type="radio" name="orangemoney" value="option1" >
                            <span class="form-check-label"><img src="{{asset('images/ompay-ci.png')}}" alt=""></span>
                            <span style="font-weight: bold;">Orange Money</span>
                         </div>
                         <hr>
                         <div style="padding-left: 20px;" class="form-group ">
                            <input class="form-check-input" type="radio" name="mtnmoney" value="option1" >
                            <span class="form-check-label"><img src="{{asset('images/momo.png')}}" alt=""></span>
                            <span style="font-weight: bold;">MTN Mobile Money</span>
                         </div>
                         <!--<hr>
                         <div style="padding-left: 20px;" class="form-group ">
                            <input class="form-check-input" type="radio" name="gender" value="option1" >
                            <span class="form-check-label"><img src="{{asset('images/logo-jpay-card.png')}}" alt=""></span>
                            <span style="font-weight: bold;">Carte Bancaire</span>
                         </div>-->
                         <div class="col-md-6 mt-4">
                            <input class="btn btn-success btn-lg btn-block" id="submit" type="submit" style="background-color: #002687;color: white;" value='Valider le paiement'>
                        </div>
                    </form>
                    </article>
                </div>    
                <br><br>
            </div>
          </div>
        
    </div>
</section>
@endsection

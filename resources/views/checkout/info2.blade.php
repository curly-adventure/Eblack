@section('extra-script')
<script src="{{ asset('js/jquery-2.0.0.min.js')}}" type="text/javascript"></script>
@endsection
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
              <a class="nav-link active" id="livraison-tab" data-toggle="tab" href="#livraison" role="tab" aria-controls="Livraison" aria-selected="false" style="color: #002687;font-weight: bold;" >Livraison</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" id="paiement-tab" data-toggle="tab" href="#paiement" role="tab" aria-controls="paiement" aria-selected="false" style="color: #002687;font-weight: bold;cursor:not-allowed">Paiement</a>
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
                        <span class="h6 price-new">{{$produit->model->getprice()}} Fcfa</span>
                        <p>Qté : {{$produit->qty}}</p>
                    </div>
                    @php $liens=$produit->model->images; $lien=json_decode($liens);$img="img.jpg";
                   if ($lien) { foreach($lien as $i){$img=$i;break;} } @endphp
                    <img class="img-sm float-right mb-2" style="width: 30%;" src="{{asset('storage/'.$img)}}">
                </div>
                
                @endforeach
                </article>
                <article class="card-body" style="-webkit-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
                -moz-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
                box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);">
                <div class="float-left" style="color:black;">Sous-total : </div> 
                <div class="float-right">{{getprice(Cart::subtotal())}} Fcfa</div>
                <br>
                @if(request()->session()->has('coupon'))
                <div class="float-left" style="color:black;">Coupon {{request()->session()->get('coupon')['code']}} : </div> 
                <div class="float-right">{{getprice(request()->session()->get('coupon')['remise'])}} Fcfa</div>
                <br>
                @endif
                <div class="float-left" style="color:black;">Frais de Livraison : </div> 
                <div class="float-right">{{getprice($tarif)}} Fcfa</div>
                <br>
                <hr>
                <div  class="float-left" style="font-weight: bold;">Total : </div> 
                <div class="float-right h6 price-new" >{{getprice($total)}} Fcfa</div>
                </article>
                <article class="text-center" style="border: 1px solid #002687">
                    <a href="{{route('produits.index')}}" class="btn btn-outline-notice" style="color: red;letter-spacing:3px">ANNULER</a>
                </article>
            </div>
         
            
        </div>
          <div class="tab-content" id="myTabContent">
            
            <div class="tab-pane fade show active" id="livraison" role="tabpanel" aria-labelledby="livraison-tab">
                
                <br> <div class="h5">2. Mode de livraison</div><br>

            <div class="card">
            <article class="card-body">
                <div style="padding-left: 10px;" class="form-group float-left">
                <input class="form-check-input" type="radio" name="gender" value="option1" checked>
                <span class="form-check-label"> Livraison a domicile </span>
                </div>
            </article>
            </div>
            <div class="card" style="margin-top:20px">
                <header class="card-header">
                    <p class="float-left" style="font-weight: bold;">Information</p>
                    <a class="btn float-right"style="color:red;font-size:14px" onclick="window.location.href = '/paiement/info/adresse';">
                        <strong>MODIFIER</strong></a>
                </header>
                <article class="card-body">
                <div>
                    <p><strong class="float-left">Contact</strong></p>
                    <p id="num" class="float-right">{{$numero}}</p>
                </div>
                <br>
                <hr>
                <div>
                <p><strong class="float-left">Expedier à  </strong></p> <br>
                    <div>
                    <p id="adr" class="">{{$adresse}}, {{$commune}}, {{$ville}}</p>
                    </div>
                </div>
                </article>
            </div>

            <div class="card d-lg-none mt-3">
                <div class="card-body">
                    <div class="float-left" style="color:black;">Sous-total : </div> 
                <div class="float-right">{{getprice(Cart::subtotal())}} Fcfa</div>
                <br>
                @if(request()->session()->has('coupon'))
                <div class="float-left" style="color:black;">Coupon {{request()->session()->get('coupon')['code']}} : </div> 
                <div class="float-right">{{getprice(request()->session()->get('coupon')['remise'])}} Fcfa</div>
                <br>
                @endif
                <div class="float-left" style="color:black;">Frais de Livraison : </div> 
                <div class="float-right">{{getprice($tarif)}} Fcfa</div>
                <br>
                <hr>
                <div  class="float-left" style="font-weight: bold;">Total : </div> 
                <div class="float-right h6 price-new" >{{getprice($total)}} Fcfa</div>

                </div>
            </div>

            <div class="col-md-6 mt-4">
                <a href="{{route('paiement.info.methodepaie',['commune_id'=> $commune_id])}}" class="btn btn-primary btn-lg btn-block" onclick="/*window.location.href = '/paiement/info/methode-paiement';*/" type="button" style="background-color: #002687;color: white;border-color:#002687">
                    Continuer</a>
            </div>
            <div class="col-md-12 mt-4">
                <a href="{{route('panier.index')}}"  class="btn btn-primary d-lg-none btn-lg btn-block" style="color: #002687;background-color: white;border-color:#002687">ANNULER</a>
            </div>
            <br><br>
            </div>
            
          </div>
        
    </div>
</section>
@include('sweetalert::alert')
@endsection

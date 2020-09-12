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
              <a class="nav-link active" id="adresse-tab" data-toggle="tab" href="#adresse" role="tab" aria-controls="adresse" aria-selected="true" style="color: #002687;font-weight: bold;">Adresse</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" id="livraison-tab" data-toggle="tab" href="#livraison" role="tab" aria-controls="Livraison" aria-selected="false" style="color: #002687;font-weight: bold;" >Livraison</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" id="paiement-tab" data-toggle="tab" href="#paiement" role="tab" aria-controls="paiement" aria-selected="false" style="color: #002687;font-weight: bold;">Paiement</a>
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
                   if ($lien) { foreach($lien as $i){$img=$i;break;} }
                   @endphp
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
                <div class="float-right">--</div>
                <br>
                <hr>
                <div  class="float-left" style="font-weight: bold;">Total : </div> 
                <div class="float-right h6 price-new" >{{$total}} Fcfa</div>
                </article>
                <article class="text-center" style="border: 1px solid #002687">
                    <a href="{{route('produits.index')}}" class="btn btn-outline-notice" style="color: red;letter-spacing:3px">ANNULER</a>
                </article>
            </div>            
        </div>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="adresse" role="tabpanel" aria-labelledby="adresse-tab">

                <div class="col-md-8">
                    <div class="card" style="border: none;">
                        <header class="card-header">
                            <h4 class="card-title mt-2">1. &nbsp;Adresse</h4>
                        </header>
                        <article class="card-body" style="-webkit-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
                        -moz-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
                        box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);">
                            <form action="{{route('paiement.store.adresse')}}" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label class="form-text text-muted">nom *</label>
                                        <input type="text" name="nom" class="form-control" id="t1" placeholder="koffi" value="{{$client->nom}}" autocomplete="nom" autofocus required>
                                    </div>
                                    <!-- form-group end.// -->
                                    <div class="col form-group">
                                        <label class="form-text text-muted">prenom *</label>
                                        <input type="text" class="form-control" id="t1" name="prenom" value="{{$client->prenom}}" placeholder="landry" autocomplete="prenom" autofocus required>
                                    </div>
                                    <!-- form-group end.// -->
                                </div>
                                <div class="form-group">
                                    <label class="form-text text-muted">email *</label>
                                    <input type="email" name="email" class="form-control" id="t1" value="{{$client->email}}" placeholder="koffi45@gmail.com" autocomplete="email" autofocus required>
                                </div>
                                <label class="form-text text-muted">numero de téléphone *</label>
                                <div class="form-row">
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="+225"style="width:70px;" disabled>
                                    </div>
                                    <!-- form-group end.// -->
                                    <div class="col form-group">
                                        <input type="text" value="{{$client->numero}}" onkeypress='validate(event)' name="numero" class="form-control numero" id="t1" required placeholder="88364404" autocomplete="numero" autofocus>
                                    </div>
                                    <!-- form-group end.// -->
                                </div>
                               
                             
                                <!-- form-group end.// -->
                                
                                <!-- form-row end.// -->
                                <div class="form-group">
                                    <label>detail Addresse *</label>
                                    <textarea name="adresse" class="form-control adresse" id="t1" maxlength="255" placeholder="detail adresse" required autocomplete="adresse" autofocus>{{$adresse_client?$adresse_client->description:""}}</textarea>
                                   
                                </div>
                                <!-- form-group end.// -->
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Ville *</label>
                                        <select id="inputState" name="ville" class="form-control ville">
                                            @foreach (App\Ville::All() as $v)
                                            @if ($v->nom==$ville_client)
                                                <option selected="">{{$v->nom}}</option>
                                            @else
                                            <option> {{$v->nom}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- form-group end.// -->
                                    <div class="form-group  col-md-6">
                                        <label>Commune *</label>
                                        <select id="inputState" name="commune" class="form-control commune">
                                            @foreach (App\Commune::All() as $c)
                                            @if ($c->nom==$commune_client)
                                                <option selected="">{{$c->nom}}</option>
                                            @else
                                            <option> {{$c->nom}}</option>
                                            @endif                                            
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- form-group end.// -->
                                </div>
                                <small class="form-text text-muted">* champs requis </small>
                                <div class="col-md-12 mt-4">
                                    <input class="btn btn-success btn-lg btn-block" type="submit" style="background-color: #002687;color: white;border:none" value="SUIVANT">
                                </div>
                            </form>
                            <div class="col-md-12 mt-4">
                                <a href="{{route('panier.index')}}"  class="btn btn-primary d-lg-none btn-lg btn-block" style="color: #002687;background-color: white;border-color:#002687">ANNULER</a>
                            </div>
                            <script>
                                function suivant() {
                                    var tab1 = document.querySelectorAll('#t1');
                                    
                                    var v=true;
                                    Array.from(tab1).forEach((elm) => {
                                        if(!elm.value) v=false;
                                    });
                                    if(v) {
                                        document.querySelector('#livraison-tab').classList.remove('disabled');
                                        //document.querySelector('#livraison-tab').classList.toggle('disabled');
                                        document.querySelector('#livraison-tab').click();
                                        var p1 = document.querySelector("#num");
                                        var p2 = document.querySelector("#adr");
                                        var num = document.querySelector('.numero');
                                        var adr = document.querySelector('.adresse');
                                        var cmne = document.querySelector('.commune');
                                        var ville = document.querySelector('.ville');
                                        p1.textContent = num.value;
                                        p2.textContent = adr.value+", "+ville.value+", "+cmne.value;
                                    }
                                    else{alert("veillez remplir tous les champs svp")}
                                }
                                function suivant2() {
                                    document.querySelector('#paiement-tab').classList.remove('disabled');
                                       
                                    document.querySelector('#paiement-tab').click();
                                }
                                function validate(evt) {
                                    var theEvent = evt || window.event;

                                    // Handle paste
                                    if (theEvent.type === 'paste') {
                                        key = event.clipboardData.getData('text/plain');
                                    } else {
                                    // Handle key press
                                        var key = theEvent.keyCode || theEvent.which;
                                        key = String.fromCharCode(key);
                                    }
                                    var regex = /[0-9]|\./;
                                    if( !regex.test(key) ) {
                                        theEvent.returnValue = false;
                                        if(theEvent.preventDefault) theEvent.preventDefault();
                                    }
                                   
                                }
                            </script>
                             
                        </article>
                       
                    </div>
                    <!-- card.// -->

                </div>
                
            </div>

    </div>
</section>
@include('sweetalert::alert')
@endsection

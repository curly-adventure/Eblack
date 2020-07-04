@extends('layouts.app')
@section('title','paiement')
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
                        <span class="h6 price-new">{{$produit->model->prix_vente}} Fcfa</span>
                        <p>Qté : {{$produit->qty}}</p>
                    </div>
                    @php $liens=$produit->model->images; $lien=json_decode($liens); @endphp
                    <img class="img-sm float-right mb-2" style="width: 30%;" src="{{asset('storage/'.$lien[0])}}">
                  
                </div>
                
                @endforeach
                </article>
                <article class="card-body" style="-webkit-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
                -moz-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
                box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);">
                <div class="float-left" style="color:black;">Sous-total : </div> 
                <div class="float-right">{{Cart::subtotal()}} Fcfa</div>
                <br>
                <hr>
                <div  class="float-left" style="font-weight: bold;">Total : </div> 
                <div class="float-right h6 price-new" >{{Cart::subtotal()}} Fcfa</div>
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
                            <form action="#">
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label class="form-text text-muted">nom *</label>
                                        <input type="text" class="form-control" id="t1" placeholder="koffi" value="{{$client->nom}}" required>
                                    </div>
                                    <!-- form-group end.// -->
                                    <div class="col form-group">
                                        <label class="form-text text-muted">prenom *</label>
                                        <input type="text" class="form-control" id="t1" value="{{$client->prenom}}" placeholder="landry" required>
                                    </div>
                                    <!-- form-group end.// -->
                                </div>
                                <div class="form-group">
                                    <label class="form-text text-muted">email *</label>
                                    <input type="email" class="form-control" id="t1" value="{{$client->email}}" placeholder="koffi45@gmail.com"required>
                                </div>
                                <label class="form-text text-muted">numero de téléphone *</label>
                                <div class="form-row">
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="+225"style="width:70px;" disabled>
                                    </div>
                                    <!-- form-group end.// -->
                                    <div class="col form-group">
                                        <input type="text" onkeypress='validate(event)' class="form-control numero" id="t1" required placeholder="88364404">
                                    </div>
                                    <!-- form-group end.// -->
                                </div>
                               
                             
                                <!-- form-group end.// -->
                                
                                <!-- form-row end.// -->
                                <div class="form-group">
                                    <label>detail Addresse *</label>
                                    <textarea name="" class="form-control adresse" id="t1" maxlength="255" placeholder="" required></textarea>
                                   
                                </div>
                                <!-- form-group end.// -->
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Ville *</label>
                                        <select id="inputState" class="form-control ville">
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
                                    <div class="form-  col-md-6">
                                        <label>Commune *</label>
                                        <select id="inputState" class="form-control commune">
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
                                    <input class="btn btn-success btn-lg btn-block" type="button" style="background-color: #002687;color: white;border:none" value="Soumettre"
                                    onclick="suivant()">
                                </div>
                            </form>
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
            <div class="tab-pane fade" id="livraison" role="tabpanel" aria-labelledby="livraison-tab">
                <div class="card" style="margin-top:20px">
                    <header class="card-header">
                        <p class="float-left" style="font-weight: bold;">Information</p>
                        <a class="btn float-right"style="color:red;font-size:14px" onclick="document.querySelector('#adresse-tab').click();">
                            <strong>MODIFIER</strong></a>
                    </header>
                    <article class="card-body">
                    <div>
                        <p><strong class="float-left">Contact  </strong></p>
                        <p id="num" class="float-right"></p>
                    </div>
                    <br>
                    <hr>
                    <div>
                    <p><strong class="float-left">Expedier à  </strong></p> <br>
                        <div>
                        <p id="adr" class=""></p>
                        </div>
                    </div>
                    </article>
                </div>
                    <br> <div class="h5">2. Mode de livraison</div><br>
            <div class="card">
            <article class="card-body">
                <div style="padding-left: 10px;" class="form-group float-left">
                <input class="form-check-input" type="radio" name="gender" value="option1" checked>
                <span class="form-check-label"> Livraison a domicile</span>
                </div>
                <div class="float-right"style="font-weight:bold">gratuit</div>
            </article>
            </div>
            <div class="col-md-6 mt-4">
                <a class="btn btn-success btn-lg btn-block" onclick="suivant2()" type="button" style="background-color: #002687;color: white;">
                    Continuer</a>
            </div>
            <br><br>
            </div>
            
            
            <div class="tab-pane fade" id="paiement" role="tabpanel" aria-labelledby="paiement-tab">
                <div class="card" style="margin-top:20px">
                    <header class="card-header">
                        <h4 class="card-title mt-2">3. &nbsp;Mode de paiement</h4>
                    </header>
                    <article class="card-body">
                        <p style="font-weight: bold;">Quel moyen de paiement voulez-vous utiliser ?</p><br>
                        <form action="{{route('paiement.store')}}" id="form-3">
                        @csrf
                        <div style="padding-left: 20px;" class="form-group ">
                            <input style="color: #002687;font-size: 20px;"class="form-check-input" type="radio" name="gender" value="option1" checked>
                            <span style="font-weight: bold;"class="form-check-label"> Paiement à la livraison</span>
                        </div>
                        <hr>
                        <div style="padding-left: 20px;" class="form-group ">
                            <input class="form-check-input" type="radio" name="gender" value="option1" >
                            <span class="form-check-label"><img src="{{asset('images/ompay-ci.png')}}" alt=""></span>
                            <span style="font-weight: bold;">Orange Money</span>
                         </div>
                         <hr>
                         <div style="padding-left: 20px;" class="form-group ">
                            <input class="form-check-input" type="radio" name="gender" value="option1" >
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
                            <input class="btn btn-success btn-lg btn-block" type="submit" style="background-color: #002687;color: white;" value='Valider le paiement'>
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

@section('extra-js')
<script>
var form = document.getElementById('form-3');
var submitButton=document.getElementById('submit');
form.addEventListener('submit', function(ev) {

});
</script>
@endsection
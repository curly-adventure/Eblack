@extends('frontend.app')
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
              <a class="nav-link" id="livraison-tab" data-toggle="tab" href="#livraison" role="tab" aria-controls="Livraison" aria-selected="false" style="color: #002687;font-weight: bold;">Livraison</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="paiement-tab" data-toggle="tab" href="#paiement" role="tab" aria-controls="paiement" aria-selected="false" style="color: #002687;font-weight: bold;">Paiement</a>
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
overflow-y: auto;">
                    <div>
                    <div class="float-left" style="width: 70%;">
                        <span class="word-limit">pantalon jeans gris</span>
                        <span class="h6 price-new">12.800 F CFA</span>
                        <p>Qantité : 1</p>
                    </div>
                    
                     <img class="img-sm float-right" style="width: 30%;" src="images/items/2.jpg">
                  
                    </div>
                    
                    <div>
                        
                        <div class="float-left" style="width: 70%;">
                            <span class="word-limit">pantalon jeans gris</span>
                            <span class="h6 price-new">12.800 F CFA</span>
                            <p>Qantité : 1</p>
                        </div>
                        
                         <img class="img-sm float-right" style="width: 30%;" src="images/items/15.jpg">
                      
                    </div>
                    <div>
                       
                        <div class="float-left" style="width: 70%;">
                            <span class="word-limit">pantalon jeans gris</span>
                            <span class="h6 price-new">12.800 F CFA</span>
                            <p>Qantité : 1</p>
                        </div>
                        
                         <img class="img-sm float-right" style="width: 30%;" src="images/items/4.jpg">
                      
                    </div>
                </article>
                <article class="card-body" style="-webkit-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
                -moz-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
                box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);">
                <div class="float-left" style="color:black;">Sous-total : </div> 
                <div class="float-right"> 4500 FCFA</div>
                <br>
                <hr>
                <div  class="float-left" style="font-weight: bold;">Total : </div> 
                <div class="float-right h6 price-new" > 4500 FCFA</div>
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
                            <form>
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label class="form-text text-muted">nom *</label>
                                        <input type="text" class="form-control" placeholder="koffi">
                                    </div>
                                    <!-- form-group end.// -->
                                    <div class="col form-group">
                                        <label class="form-text text-muted">prenom *</label>
                                        <input type="text" class="form-control" placeholder="landry">
                                    </div>
                                    <!-- form-group end.// -->
                                </div>
                                <div class="form-group">
                                    <label class="form-text text-muted">email *</label>
                                    <input type="email" class="form-control" placeholder="koffi45@gmail.com">
                                </div>
                                <label class="form-text text-muted">numero de téléphone *</label>
                                <div class="form-row">
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="+225"style="width:70px;" disabled>
                                    </div>
                                    <!-- form-group end.// -->
                                    <div class="col form-group">
                                        <input type="text" class="form-control" placeholder="88364404">
                                    </div>
                                    <!-- form-group end.// -->
                                </div>
                               
                             
                                <!-- form-group end.// -->
                                
                                <!-- form-row end.// -->
                                <div class="form-group">
                                    <label>Addresse *</label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                                <!-- form-group end.// -->
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Ville *</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <!-- form-group end.// -->
                                    <div class="form-group col-md-6">
                                        <label>Commune *</label>
                                        <select id="inputState" class="form-control">
                                            <option> Yopougon</option>
                                            <option>marcory</option>
                                            <option>TreichVille</option>
                                            <option selected="">Cocody</option>
                                            <option>Adjamer</option>
                                            <option>Abobo</option>
                                        </select>
                                    </div>
                                    <!-- form-group end.// -->
                                </div>
                                <small class="form-text text-muted">* champs requis </small>
                            </form>
                            <div class="col-md-12 mt-4">
                                <a class="btn btn-success btn-lg btn-block" type="button" style="background-color: #002687;color: white;">Enregistrer</a>
                            </div>
                        </article>
                       
                    </div>
                    <!-- card.// -->

                </div>
                
            </div>
            <div class="tab-pane fade" id="livraison" role="tabpanel" aria-labelledby="livraison-tab">
                <div class="card" style="margin-top:20px">
                    <header class="card-header">
                        <p class="float-left" style="font-weight: bold;">Information</p>
                        <a class="btn float-right"style="color:red;font-size:14px"><strong>MODIFIER</strong></a>
                    </header>
                    <article class="card-body">
                    <div>
                        <p><strong class="float-left">Contact  </strong></p>
                        <p class="float-right"> 45836987</p>
                    </div>
                    <br>
                    <hr>
                    <div>
                    <p><strong class="float-left">Expedier à  </strong></p>
                        <p class="float-right">adresse, commune , ville </p>
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
                <a class="btn btn-success btn-lg btn-block" type="button" style="background-color: #002687;color: white;">Continuer</a>
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
                        <form action="">
                        <div style="padding-left: 20px;" class="form-group ">
                            <input style="color: #002687;font-size: 20px;"class="form-check-input" type="radio" name="gender" value="option1" checked>
                            <span style="font-weight: bold;"class="form-check-label"> Paiement à la livraison</span>
                        </div>
                        <hr>
                        <div style="padding-left: 20px;" class="form-group ">
                            <input class="form-check-input" type="radio" name="gender" value="option1" >
                            <span class="form-check-label"><img src="images/ompay-ci.png" alt=""></span>
                            <span style="font-weight: bold;">Orange Money</span>
                         </div>
                         <hr>
                         <div style="padding-left: 20px;" class="form-group ">
                            <input class="form-check-input" type="radio" name="gender" value="option1" >
                            <span class="form-check-label"><img src="images/momo.png" alt=""></span>
                            <span style="font-weight: bold;">MTN Mobile Money</span>
                         </div>
                         <hr>
                         <div style="padding-left: 20px;" class="form-group ">
                            <input class="form-check-input" type="radio" name="gender" value="option1" >
                            <span class="form-check-label"><img src="images/logo-jpay-card.png" alt=""></span>
                            <span style="font-weight: bold;">Carte Bancaire</span>
                         </div>
                         
                    </form>
                    </article>
                </div>    
                <div class="col-md-6 mt-4">
                    <a class="btn btn-success btn-lg btn-block" type="button" style="background-color: #002687;color: white;">Valider le paiement</a>
                </div>
                <br><br>
            </div>
          </div>
        
    </div>
</section>
@endsection

@section('extra-js')
    <script>
        var stripe = Stripe('pk_test_51GvMrEIC4FQuwivkob7owwAwRqpy5s2PAOJQYMF26g20GTTKGIX8fQa1nvR4AOSBWX6J5NiuLXc3lNeZhUqJBBJK00KS7UeuSz');
        var elements = stripe.elements();
    </script>
@endsection
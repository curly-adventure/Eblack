@extends('frontend.app')
@section('title','detail produit')
@section('content')
<section class="section-content bg padding-y border-top" style="padding-top: 100px;">

    <div class="col" >
        <nav class="col-md-18-24">
           <br>
            <ol class="breadcrumb">
                <li id="indic"class="breadcrumb-item"><a href="#">Accueil</a></li>
                <li class="breadcrumb-item"><a href="#">categories</a></li>
                <li class="breadcrumb-item"><a href="#">Sous categories</a></li>
                <li class="breadcrumb-item active" aria-current="page">produits</li>
            </ol>
        </nav> <!-- col.// -->
    </div>
    <br>
    <h1>
        {{$produit->nom}}
    </h1>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="row no-gutters">
                        <aside class="col-sm-5 border-right">
                            <article class="gallery-wrap">
                                <div class="img-big-wrap">
                                    <div>
                                        <a id="item-display" href="images/items/7.jpg" data-fancybox=""><img class="img-fluid" src="images/items/3.jpg" style="max-height:300px"></a>
                                    </div>
                                </div>
                                <!-- slider-product.// -->
                                <div class="img-small-wrap">
                                    <div id="item-1"class="item-gallery"> <img src="images/items/15.jpg"></div>
                                    <div id="item-2" class="item-gallery"> <img src="images/items/2.jpg"></div>
                                    <div class="item-gallery"> <img src="images/items/3.jpg"></div>
                                    <div class="item-gallery"> <img src="images/items/4.jpg"></div>
                                </div>
                                <!-- slider-nav.// -->
                            </article>
                            <!-- gallery-wrap .end// -->
                        </aside>
                        <aside class="col-sm-7">
                            <article class="p-5">
                                <h3 class="title mb-3">Pantallon jeans orange</h3>

                                <div class="mb-3">
                                    <var class="price h3 " style="color:red;">
                            <span class="currency"></span><span class="num">1299 F CFA</span>
                                     </var>
                                    
                                </div>
                                <!-- price-detail-wrap .// -->
                                <dl>
                                    <dt>Description</dt>
                                    <dd>
                                        <p>Here goes description consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco </p>
                                    </dd>
                                </dl>
                               
                                <div class="rating-wrap">

                                    <ul class="rating-stars">
                                        <li style="width:80%" class="stars-active">
                                            <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </li>
                                    </ul>
                                    <div class="label-rating">51 avis</div>
                                    
                                </div>
                                <!-- rating-wrap.// -->
                                <hr>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <dl class="dlist-inline">
                                            <dt>Quantité  </dt>
                                            <dd>
                                                <select class="form-control form-control-sm" style="width:70px;">
                                                    <option> 1 </option>
                                                    <option> 2 </option>
                                                    <option> 3 </option>
                                                </select>
                                            </dd>
                                        </dl>
                                        <!-- item-property .// -->
                                    </div>
                                    <!-- col.// -->
                                    <div class="col-sm-7">
                                        <dl class="dlist-inline">
                                            <dt>Size: </dt>
                                            <dd>
                                                <label class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                    <span class="form-check-label">SM</span>
                                                </label>
                                                <label class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                    <span class="form-check-label">MD</span>
                                                </label>
                                                <label class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                    <span class="form-check-label">XXL</span>
                                                </label>
                                            </dd>
                                        </dl>
                                        <!-- item-property .// -->
                                    </div>
                                    <!-- col.// -->
                                </div>
                                <!-- row.// -->
                                <hr>
                                <div class="row">
                               <a data-original-title="Sauver dans favoris" title="" href="" class="btn " data-toggle="tooltip" style="border-color: #002687;color:#002687;"> <i class="fas fa-heart"></i> </span></a> 
                               <span>&nbsp;</span>
                               <a data-original-title="Ajouter au panier" title="" href="" class="btn " data-toggle="tooltip" style="border-color: #002687;color:#002687;">  <i class="fas fa-shopping-cart"></i> Ajouter au panier</a>
                               </div>
                            </article>
                            <!-- card-body.// -->
                        </aside>
                        <!-- col.// -->
                    </div>
                    <!-- row.// -->
                </div>
                <!-- card.// -->

            </div>

            <div class="col-md-12" style="margin-top: 50px;">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" style="font-weight: bold;">Fiche Technique</a>
                    </li>
                   
                  </ul>
                  <div class="tab-content" id="myTabContent">
                    <div style="background-color: white;font-size: 20px;padding: 25px;"class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                       <ul class="float-left">
                           <p style="font-weight: bold;">Caracteristique</p>
                           <li>Type de produit: Pantalon</li>
                           <li>Matière: Coton</li>
                           <li>Classique</li>
                           <li>Gentleman's look</li>
                       </ul>
                       <ul class="float-right">
                        <p style="font-weight: bold;">Fiche Technique</p>
                        <li> SKU: FA459FA048DI3NAFAMZ</li>
                        <li>Couleur: Bleu & Kaki</li>
                        <li>Matériau principal: coton</li>
                        <li>Modèle: Pantalon</li>
                        <li>Gamme de produits: pour les hommes</li>
                        <li>Poids (kg): 0,2</li>
                       </ul>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========================= SECTION CONTENT END// ========================= -->
<section class="section-content padding-y-sm bg">
    
    <div class="container">

        <header class="section-heading heading-line">
            <h4 class="title-section bg">Produits identiques</h4>
        </header>
        <div class="owl-carousel owl-init slide-items col" data-items="5" data-margin="20" data-dots="true" data-nav="true" >
            <div class="item-slide">
        <figure class="card card-product">
            <span class="badge-new"> NEW </span>
            <div class="img-wrap"> <img src="images/items/15.jpg"> </div>
            <figcaption class="info-wrap text-center">
                <h6 class="title text-truncate">
                <a class="title"href="#">First item name</a></h6>
                <div class="price-wrap">
                    <span class="h6 price-new">1280 FCFA</span>
                    <del class="price-old">1980 FCFA</del>
                    
                </div>
            </figcaption>
        </figure> <!-- card // -->
            </div>
            <div class="item-slide">
                <figure class="card card-product">
                   
                    <div class="img-wrap"> <img src="images/produits/culotte.jpg"> </div>
                    <figcaption class="info-wrap text-center">
                        <h6 class="title text-truncate">
                        <a class="title"href="#">First item name</a></h6>
                        <div class="price-wrap">
                            <span class="h6 price-new">1280 FCFA</span>
                            <del class="price-old">1980 FCFA</del>
                            
                        </div>
                    </figcaption>
                </figure> <!-- card // -->
                    </div>
            <div class="item-slide">
        <figure class="card card-product">
            <div class="img-wrap"> <img src="images/items/4.jpg"> </div>
            <figcaption class="info-wrap text-center">
                <h6 class="title text-truncate"><a href="#">Good item name</a></h6>
            </figcaption>
        </figure> <!-- card // -->
            </div>
            <div class="item-slide">
        <figure class="card card-product">
            <div class="img-wrap"> <img src="images/items/5.jpg"> </div>
            <figcaption class="info-wrap text-center">
                <h6 class="title text-truncate"><a href="#">Another item name</a></h6>
            </figcaption>
        </figure> <!-- card // -->
            </div>
            <div class="item-slide">
        <figure class="card card-product">
            <div class="img-wrap"> <img src="images/items/3.jpg"> </div>
            <figcaption class="info-wrap text-center">
                <h6 class="title text-truncate"><a href="#">Third item name</a></h6>
            </figcaption>
        </figure> <!-- card // -->
            </div>
        </div>
          
    <!-- container .//  -->
</section>
@stop
@extends('frontend.app')
@section('title','Accueil')

@section('content')
@include('frontend.partials.slider')
<section class="section-content padding-y-sm bg reveal">
    <div class="container">
    
    <header class="section-heading heading-line reveal-1">
        <h4 class="title-section bg">NOUVEAUTES</h4>
    </header>
    
    <div class="card">
    <div class="row no-gutters">
        <div class="col-md-3">
        
    <article href="#" class="card-banner h-100 reveal-2"style="background-color: #162A70">
        <div class="card-body zoom-wrap align-items-center row justify-content-center">
            <!--<h5 class="title">Les plus vendu</h5>
            <p>les meilleurs produits, les plus vendu sur eblack mpor incididunt ut labore et dolore magna aliqua.</p>-->
            <a href="liste_grid.html"  class="btn btn-outline-primary round align-self-center" style="width: 100px;z-index: 999999;border: 2px solid white;font-weight: bold; color: white;">
                Explorer</a>
            <img src="images/banners/h_chemise-motif-carrly.jpg" style="width:100%;height:100%;z-index: -1;" class="img-bg zoom-in d-none d-lg-block">
        </div>
    </article>
    
        </div> <!-- col.// -->
        <div class="col-md-9 reveal-3">
        <ul class="row no-gutters border-cols">
        <li class="col-6 col-md-3">
        <a href="#" class="itembox"> 
            <div class="card-body">
            <p class="word-limit">sac a main rouge</p>
            <div class="price-wrap h6 float-left">
                <span class="price-new">$1280</span> <del class="price-old ">$1980</del>
            </div>
            <div class="float-right">
                <!--<span class="badge-new float-right"> NEW </span>-->
                <img class="img-sm float-right " src="images/items/3.jpg">
            </div>
            
            <div class="bottom-wrap">
                <a href="" class="btn btn-outline-primary btn-sm float-left"><i class="fa fa-heart"></i></a>			
                <span class="float-right"> &nbsp;&nbsp;</span>
                <a href="" class="btn btn-outline-primary btn-sm float-right"><i class="fa fa-shopping-cart"></i></a>
                <!-- price-wrap.// -->
            </div>
            </div>
        </a>
        </li>
        <li class="col-6 col-md-3">
            <a href="#" class="itembox"> 
                <div class="card-body">
                <p class="word-limit">iphone 11</p>
                <div class="price-wrap h6 float-left">
                    <span class="price-new">$1280</span> <del class="price-old ">$1980</del>
                </div>
                <div class="float-right">
                    <img class="img-sm float-right " src="images/items/4.jpg">
                </div>
                
                <div class="bottom-wrap">
                    <a href="" class="btn btn-outline-primary btn-sm float-left"><i class="fa fa-heart"></i></a>			
                    <span class="float-right"> &nbsp;&nbsp;</span>
                    <a href="" class="btn btn-outline-primary btn-sm float-right"><i class="fa fa-shopping-cart"></i></a>
                    <!-- price-wrap.// -->
                </div>
                </div>
            </a>
            </li>
            <li class="col-6 col-md-3">
                <a href="#" class="itembox"> 
                    <div class="card-body">
                    <p class="word-limit">chemise manches longues bas arrondi femme blanc</p>
                    <div class="price-wrap h6 float-left">
                        <span class="price-new">$1280</span> <del class="price-old ">$1980</del>
                    </div>
                    <div class="float-right">
                        <img class="img-sm float-right " src="images/items/14.jpg">
                    </div>
                    
                    <div class="bottom-wrap">
                        <a href="" class="btn btn-outline-primary btn-sm float-left"><i class="fa fa-heart"></i></a>			
                        <span class="float-right"> &nbsp;&nbsp;</span>
                        <a href="" class="btn btn-outline-primary btn-sm float-right"><i class="fa fa-shopping-cart"></i></a>
                        <!-- price-wrap.// -->
                    </div>
                    </div>
                </a>
            </li>
            <li class="col-6 col-md-3">
                <a href="#" class="itembox"> 
                    <div class="card-body">
                    <p class="word-limit">chaussure nike</p>
                    <div class="price-wrap h6 float-left">
                        <span class="price-new">$1280</span> <del class="price-old ">$1980</del>
                    </div>
                    <div class="float-right">
                        <img class="img-sm float-right " src="images/items/1.jpg">
                    </div>
                    
                    <div class="bottom-wrap">
                        <a href="" class="btn btn-outline-primary btn-sm float-left"><i class="fa fa-heart"></i></a>			
                        <span class="float-right"> &nbsp;&nbsp;</span>
                        <a href="" class="btn btn-outline-primary btn-sm float-right"><i class="fa fa-shopping-cart"></i></a>
                        <!-- price-wrap.// -->
                    </div>
                    </div>
                </a>
                </li>
    </ul>
    <ul class="row no-gutters border-cols">
        <li class="col-6 col-md-3">
        <a href="#" class="itembox"> 
            <div class="card-body">
            <p class="word-limit">sac a main rouge</p>
            <div class="price-wrap h6 float-left">
                <span class="price-new">$1280</span> <del class="price-old ">$1980</del>
            </div>
            <div class="float-right">
                <img class="img-sm float-right " src="images/items/2.jpg">
            </div>
            
            <div class="bottom-wrap">
                <a href="" class="btn btn-outline-primary btn-sm float-left"><i class="fa fa-heart"></i></a>			
                <span class="float-right"> &nbsp;&nbsp;</span>
                <a href="" class="btn btn-outline-primary btn-sm float-right"><i class="fa fa-shopping-cart"></i></a>
                <!-- price-wrap.// -->
            </div>
            </div>
        </a>
        </li>
        <li class="col-6 col-md-3">
            <a href="#" class="itembox"> 
                <div class="card-body">
                <p class="word-limit">iphone 11</p>
                <div class="price-wrap h6 float-left">
                    <span class="price-new">$1280</span> <del class="price-old ">$1980</del>
                </div>
                <div class="float-right">
                    <img class="img-sm float-right " src="images/items/9.jpg">
                </div>
                
                <div class="bottom-wrap">
                    <a href="" class="btn btn-outline-primary btn-sm float-left"><i class="fa fa-heart"></i></a>			
                    <span class="float-right"> &nbsp;&nbsp;</span>
                    <a href="" class="btn btn-outline-primary btn-sm float-right"><i class="fa fa-shopping-cart"></i></a>
                    <!-- price-wrap.// -->
                </div>
                </div>
            </a>
            </li>
            <li class="col-6 col-md-3">
                <a href="#" class="itembox"> 
                    <div class="card-body">
                    <p class="word-limit">chemise manches longues bas arrondi femme blanc</p>
                    <div class="price-wrap h6 float-left">
                        <span class="price-new">$1280</span> <del class="price-old ">$1980</del>
                    </div>
                    <div class="float-right">
                        <img class="img-sm float-right " src="images/items/10.jpg">
                    </div>
                    
                    <div class="bottom-wrap">
                        <a href="" class="btn btn-outline-primary btn-sm float-left"><i class="fa fa-heart"></i></a>			
                        <span class="float-right"> &nbsp;&nbsp;</span>
                        <a href="" class="btn btn-outline-primary btn-sm float-right"><i class="fa fa-shopping-cart"></i></a>
                        <!-- price-wrap.// -->
                    </div>
                    </div>
                </a>
            </li>
            <li class="col-6 col-md-3">
                <a href="#" class="itembox"> 
                    <div class="card-body">
                    <p class="word-limit">chaussure nike</p>
                    <div class="price-wrap h6 float-left">
                        <span class="price-new">$1280</span> <del class="price-old ">$1980</del>
                    </div>
                    <div class="float-right">
                        <img class="img-sm float-right " src="images/items/11.jpg">
                    </div>
                    
                    <div class="bottom-wrap">
                        <a href="" class="btn btn-outline-primary btn-sm float-left"><i class="fa fa-heart"></i></a>			
                        <span class="float-right"> &nbsp;&nbsp;</span>
                        <a href="" class="btn btn-outline-primary btn-sm float-right"><i class="fa fa-shopping-cart"></i></a>
                        <!-- price-wrap.// -->
                    </div>
                    </div>
                </a>
                </li>
    </ul>
        </div> <!-- col.// -->
    </div> <!-- row.// -->
        
    </div> <!-- card.// -->
    
    </div> <!-- container .//  -->
    </section>
    <!-- ========================= SECTION CONTENT END// ========================= -->
    
    <!-- ========================= SECTION CONTENT ========================= -->
    <section class="section-content padding-y-sm bg reveal">
        <div class="container">
        
        <header class="section-heading heading-line reveal-1">
            <h4 class="title-section bg">POPULAIRES</h4>
        </header>
        
        <div class="card">
        <div class="row no-gutters">
            <div class="col-md-3">
            
            <article href="#" class="card-banner h-100 reveal-2"style="background-color: #162A70">
                    <div class="card-body zoom-wrap align-items-center row justify-content-center">			<a href="liste_grid.html"  class="btn btn-outline-primary round align-self-center" style="width: 100px;z-index: 999999;border: 2px solid white;font-weight: bold; color: white;">
                    Explorer</a>
                <img src="images/banners/shoe.jpg" style="width:100%;height:100%;z-index: -1;" class="img-bg zoom-in d-none d-lg-block">
            </div>
        </article>
            </div> <!-- col.// -->
            <div class="col-md-9 reveal-3">
            <ul class="row no-gutters border-cols">
            <li class="col-6 col-md-3">
            <a href="#" class="itembox"> 
                <div class="card-body">
                <p class="word-limit">sac a main rouge</p>
                <div class="price-wrap h6 float-left">
                    <span class="price-new">$1280</span> <del class="price-old ">$1980</del>
                </div>
                <div class="float-right">
                    <img class="img-sm float-right " src="images/items/5.jpg">
                </div>
                
                <div class="bottom-wrap">
                    <a href="" class="btn btn-outline-primary btn-sm float-left"><i class="fa fa-heart"></i></a>			
                    <span class="float-right"> &nbsp;&nbsp;</span>
                    <a href="" class="btn btn-outline-primary btn-sm float-right"><i class="fa fa-shopping-cart"></i></a>
                    <!-- price-wrap.// -->
                </div>
                </div>
            </a>
            </li>
            <li class="col-6 col-md-3">
                <a href="#" class="itembox"> 
                    <div class="card-body">
                    <p class="word-limit">T-shirt 11</p>
                    <div class="price-wrap h6 float-left">
                        <span class="price-new">$1280</span> <del class="price-old ">$1980</del>
                    </div>
                    <div class="float-right">
                        <img class="img-sm float-right " src="images/items/6.jpg">
                    </div>
                    
                    <div class="bottom-wrap">
                        <a href="" class="btn btn-outline-primary btn-sm float-left"><i class="fa fa-heart"></i></a>			
                        <span class="float-right"> &nbsp;&nbsp;</span>
                        <a href="" class="btn btn-outline-primary btn-sm float-right"><i class="fa fa-shopping-cart"></i></a>
                        <!-- price-wrap.// -->
                    </div>
                    </div>
                </a>
                </li>
                <li class="col-6 col-md-3">
                    <a href="#" class="itembox"> 
                        <div class="card-body">
                        <p class="word-limit">montre noir swagg</p>
                        <div class="price-wrap h6 float-left">
                            <span class="price-new">$1280</span> <del class="price-old ">$1980</del>
                        </div>
                        <div class="float-right">
                            <img class="img-sm float-right " src="images/items/7.jpg">
                        </div>
                        
                        <div class="bottom-wrap">
                            <a href="" class="btn btn-outline-primary btn-sm float-left"><i class="fa fa-heart"></i></a>			
                            <span class="float-right"> &nbsp;&nbsp;</span>
                            <a href="" class="btn btn-outline-primary btn-sm float-right"><i class="fa fa-shopping-cart"></i></a>
                            <!-- price-wrap.// -->
                        </div>
                        </div>
                    </a>
                </li>
                <li class="col-6 col-md-3">
                    <a href="#" class="itembox"> 
                        <div class="card-body">
                        <p class="word-limit">chaussure nike</p>
                        <div class="price-wrap h6 float-left">
                            <span class="price-new">$1280</span> <del class="price-old ">$1980</del>
                        </div>
                        <div class="float-right">
                            <img class="img-sm float-right " src="images/items/8.jpg">
                        </div>
                        
                        <div class="bottom-wrap">
                            <a href="" class="btn btn-outline-primary btn-sm float-left"><i class="fa fa-heart"></i></a>			
                            <span class="float-right"> &nbsp;&nbsp;</span>
                            <a href="" class="btn btn-outline-primary btn-sm float-right"><i class="fa fa-shopping-cart"></i></a>
                            <!-- price-wrap.// -->
                        </div>
                        </div>
                    </a>
                    </li>
        </ul>
        <ul class="row no-gutters border-cols">
            <li class="col-6 col-md-3">
            <a href="#" class="itembox"> 
                <div class="card-body">
                <p class="word-limit">sac a main rouge</p>
                <div class="price-wrap h6 float-left">
                    <span class="price-new">$1280</span> <del class="price-old ">$1980</del>
                </div>
                <div class="float-right">
                    <img class="img-sm float-right " src="images/items/12.png">
                </div>
                
                <div class="bottom-wrap">
                    <a href="" class="btn btn-outline-primary btn-sm float-left"><i class="fa fa-heart"></i></a>			
                    <span class="float-right"> &nbsp;&nbsp;</span>
                    <a href="" class="btn btn-outline-primary btn-sm float-right"><i class="fa fa-shopping-cart"></i></a>
                    <!-- price-wrap.// -->
                </div>
                </div>
            </a>
            </li>
            <li class="col-6 col-md-3">
                <a href="#" class="itembox"> 
                    <div class="card-body">
                    <p class="word-limit">T-shirt noir</p>
                    <div class="price-wrap h6 float-left">
                        <span class="price-new">$1280</span> <del class="price-old ">$1980</del>
                    </div>
                    <div class="float-right">
                        <img class="img-sm float-right " src="images/items/13.png">
                    </div>
                    
                    <div class="bottom-wrap">
                        <a href="" class="btn btn-outline-primary btn-sm float-left"><i class="fa fa-heart"></i></a>			
                        <span class="float-right"> &nbsp;&nbsp;</span>
                        <a href="" class="btn btn-outline-primary btn-sm float-right"><i class="fa fa-shopping-cart"></i></a>
                        <!-- price-wrap.// -->
                    </div>
                    </div>
                </a>
                </li>
                <li class="col-6 col-md-3">
                    <a href="#" class="itembox"> 
                        <div class="card-body">
                        <p class="word-limit">chemise manches longues bas arrondi femme blanc</p>
                        <div class="price-wrap h6 float-left">
                            <span class="price-new">$1280</span> <del class="price-old ">$1980</del>
                        </div>
                        <div class="float-right">
                            <img class="img-sm float-right " src="images/items/14.jpg">
                        </div>
                        
                        <div class="bottom-wrap">
                            <a href="" class="btn btn-outline-primary btn-sm float-left"><i class="fa fa-heart"></i></a>			
                            <span class="float-right"> &nbsp;&nbsp;</span>
                            <a href="" class="btn btn-outline-primary btn-sm float-right"><i class="fa fa-shopping-cart"></i></a>
                            <!-- price-wrap.// -->
                        </div>
                        </div>
                    </a>
                </li>
                <li class="col-6 col-md-3">
                    <a href="#" class="itembox"> 
                        <div class="card-body">
                        <p class="word-limit">chaussure nike</p>
                        <div class="price-wrap h6 float-left">
                            <span class="price-new">$1280</span> <del class="price-old ">$1980</del>
                        </div>
                        <div class="float-right">
                            <img class="img-sm float-right " src="images/items/15.jpg">
                        </div>
                        
                        <div class="bottom-wrap">
                            <a href="" class="btn btn-outline-primary btn-sm float-left"><i class="fa fa-heart"></i></a>			
                            <span class="float-right"> &nbsp;&nbsp;</span>
                            <a href="" class="btn btn-outline-primary btn-sm float-right"><i class="fa fa-shopping-cart"></i></a>
                            <!-- price-wrap.// -->
                        </div>
                        </div>
                    </a>
                    </li>
        </ul>
            </div> <!-- col.// -->
        </div> <!-- row.// -->
            
        </div> <!-- card.// -->
        
        </div> <!-- container .//  -->
        </section>
        
    <!-- ========================= SECTION REQUEST ========================= -->
    <section class="section-request bg padding-y-sm d-lg-block d-none">
        <div class="container">
        <header class="section-heading heading-line">
            <h4 class="title-section bg text-uppercase">Demande de devis</h4>
        </header>
        
        <div class="row ">
        <div class="col-md-8">
        <figure class="card-banner banner-size-lg">
            <figcaption class="overlay left">
                <br>
                <h2 style="max-width: 300px;">collection d'articles en vedette</h2>
                <br>
                <a class="btn btn-outline-primary" href="#">Detail info » </a>
            </figcaption>
            <img src="images/banners/premail22.gif">
            <p style="position: absolute;color:white;font-size:30px;font-weight: bold;margin:20px" class="">Un moyen simple d'envoyer une demande aux fournisseurs</p>
        </figure>
            </div> <!-- col // -->
            <div class="col-md-4">
        
        <div class="card card-body">
            <h5 class="title py-4">Une demande, plusieurs devis.</h5>
            <form>
                <div class="form-group">
                    <input class="form-control" name="" type="text" placeholder="Que cherchez-vous ?">
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input class="form-control" name="" type="text" placeholder="Quantité ?">
                        <span class="input-group-btn" style="border:0; width: 0;"></span>
                        <select class="form-control">
                            <option>taille</option>
                            <option>toutes les tailles</option>
                            <option>XXL</option>
                            <option>XL</option>
                            <option>L</option>
                            <option>M</option>
                        </select>
                    </div>
                </div>
                <div class="form-group text-muted">
                    
                    <label class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" value="option1">
                      <span class="form-check-label">Demander le prix</span>
                    </label>
                    <label class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" value="option2">
                      <span class="form-check-label">Demander un échantillon</span>
                    </label>
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-outline-primary"style="width:100px">Envoyer</button>
                </div>
            </form>
        </div>
        
            </div> <!-- col // -->
        </div><!-- row // -->
        
        </div><!-- container // -->
        </section>

@stop
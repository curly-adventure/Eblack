@extends('frontend/app')
@section('title','detail produit')
@section('content')
<section class="section-content bg padding-y border-top" style="padding-top: 80px;">

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
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="row no-gutters">
                        <aside class="col-sm-5 border-right">
                            <article class="gallery-wrap">
                                <div class="img-big-wrap">
                                    @php $liens=$produit->images; $lien=json_decode($liens); @endphp
                                    <div>
                                        <a id="item-display" href="{{asset('storage/'.$lien[0])}}" data-fancybox=""><img class="img-fluid" src="{{asset('storage/'.$lien[0])}}" style="max-height:300px"></a>
                                    </div>
                                </div>
                                <!-- slider-product.// -->
                                <div class="img-small-wrap">
                                    @foreach ($lien as $img)
                                    <div class="item-gallery"> <img src="{{asset('storage/'.$img)}}"></div>
                                    @endforeach
                                </div>
                                <!-- slider-nav.// -->
                            </article>
                            <!-- gallery-wrap .end// -->
                        </aside>
                        <aside class="col-sm-7">
                            
                            <article class="p-5">
                                <a data-original-title="Sauver dans favoris" title="" href="" class="btn " data-toggle="tooltip" style="border-color: #002687;color:#002687;position: absolute;left:90%"> <i class="fas fa-heart"></i> </span></a>
                                <h3 class="title mb-3">{{$produit->nom}}</h3>

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
                                <hr>
                                <div class="mb-3">
                                    <var class="price h3 " style="font-weight:bold">
                                   <span class="num">{{$produit->prix_vente}}F CFA</span>
                                   <span>&nbsp;</span>
                                    </span><del class="price-old">{{$produit->prix_achat}} FCFA</del></span>
                                </var>
                                </div>
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
                            <form action="{{route('panier.store')}}" method="POST">
                                    <button data-original-title="Ajouter au panier" type="submit" class="btn " data-toggle="tooltip" style="background:white;border-color: #002687;color:#002687;">
                                    <i class="fas fa-shopping-cart"></i> Ajouter au panier</button>
                                    @csrf
                                    <input type="hidden" name="produit_id" value="{{$produit->id}}">
                                    {{--<input type="hidden" name="nom" value="{{$produit->nom}}">
                                    <input type="hidden" name="prix" value="{{$produit->prix_vente}}">--}}
                                </form>
                                
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
                <ul class="nav nav-tabs" id="myTab" role="tablist" style="">
                    <li class="nav-item">
                      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" style="font-weight: bold;">Description</a>
                    </li>
                   
                  </ul>
                  <div class="tab-content" style="background-color: white;" id="myTabContent">
                    <div style="background-color: white;font-size: 20px;padding: 25px;"class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        {{$produit->description}}               
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
        <div class="owl-carousel owl-init slide-items col" data-items="4" data-margin="20" data-dots="true" data-nav="true" >
            @for ($i = 0; $i < 10; $i++)
            <div class="item-slide">
            <figure class="card card-product">
            <span class="badge-new"> NEW </span>
            <div class="img-wrap"> <img src="images/items/15.jpg"> </div>
            <figcaption class="info-wrap text-center">
                <h6 class="title text-truncate">
                <a class="title"href="#">produit {{$i}}</a></h6>
                <div class="price-wrap">
                    <span class="h6 price-new">1280 FCFA</span>
                    <del class="price-old">1980 FCFA</del>
                    
                </div>
            </figcaption>
            </figure> <!-- card // -->
            </div>
            @endfor       
    <!-- container .//  -->
</section>
@stop
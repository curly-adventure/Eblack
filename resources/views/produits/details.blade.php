@extends('layouts.app')
@section('title','detail produit')
@section('content')
<section class="section-content bg padding-y border-top" style="padding-top: 80px;">
<style>
    .rating {
   direction: rtl;
}
.rating a {
   color: #aaa;
   text-decoration: none;
   font-size: 2em;
   transition: color .4s;
}
.rating a:hover,
.rating a:focus,
.rating a:hover ~ a,
.rating a:focus ~ a {
   color: orange;
   cursor: pointer;
}
</style>
    <div class="col" >
        <nav class="col-md-18-24">
           <br>
           <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL('/')}}">Accueil</a></li>
            
            @foreach ($lien as  $item=>$i)
             
            @if ($item==$sous_categorie->nom) <li class="breadcrumb-item"><a href="{{route($i,['categorie'=>$categorie->id,'souscategorie'=>$sous_categorie->id])}}">{{$item}}</a></li>
            @elseif ($item==$categorie->nom) <li class="breadcrumb-item"><a href="{{route($i,['categorie'=>$categorie->id])}}">{{$item}}</a></li>
            @else
            <li class="breadcrumb-item"><a href="#">{{$item}}</a></li>
            @endif
            
            @endforeach
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
                                    @php $liens=$produit->images; $lien=json_decode($liens); $img="img.jpg";
                                    if ($lien) { $img=$lien[0]; }  @endphp
                                    <div>
                                        <a id="item-display" href="{{asset('storage/'.$img)}}" data-fancybox=""><img id="display" class="img-fluid" src="{{asset('storage/'.$img)}}" style="max-height:300px"></a>
                                    </div>
                                </div>

                                <div class="img-small-wrap">
                                    @foreach ($lien as $img)
                                    <div class="item-gallery"> <img class="item"src="{{asset('storage/'.$img)}}"></div>
                                    @endforeach
                                </div>
                                @section('extra-js')
                                    <script>
                                        var display= document.querySelector('#display');
                                        var itemdisplay= document.querySelector('#item-display');
                                        var small = document.querySelectorAll('.item');
                                        small.forEach((element)=> element.addEventListener('click',changeImage));
                                        function changeImage(e) {
                                            display.src = this.src;
                                            itemdisplay.href=this.src;
                                        }
                                    </script>
                                @endsection
                            </article>
                            <!-- gallery-wrap .end// -->
                        </aside>
                        <aside class="col-sm-7">
                            
                            <article class="p-5">
                                
                            <form action="{{route('wishlist.store')}}" method="POST">
                                @php
                                $exist=false;
                                if(\Auth::user()){
                                foreach (\Auth::user()->wishlist('default') as $prod) {if ($prod->nom == $produit->nom) $exist=true; }
                                }
                                    $exist ? $class='fas fa-heart' : $class="far fa-heart"
                                @endphp
                                <button type="submit" data-original-title="favoris" class="btn" data-toggle="tooltip" style="background:white;border-color: #002687;color:#002687;position: absolute;left:80%">
                                 <i class="{{$class}}"></i> </button>
                                @csrf
                                <input type="hidden" name="produit_id" value="{{$produit->id}}">
                            </form>
                            <span class="badge badge-pill badge-info float-right d-none d-lg-block" style="margin-right: 45%;">{{$stock =="Indisponible"?$stock:"" }}</span>
                                <h3 class="title mb-3">{{$produit->nom}}</h3>

                                <div class="rating-wrap">
                                  
                                    <div class="rating" style="display: inline-block">
                                 
                                        @for ($i = 5-intval($produit->averageRating); $i >0 ; $i--)
                                        <a href="{{route('produit.rate',[$produit->id,intval($produit->averageRating)+$i])}}" title="Donner {{intval($produit->averageRating)+$i}} étoiles">☆</a>
                                     @endfor
                                        @for ($i = intval($produit->averageRating); $i >=1 ; $i--)
                                        <a href="{{route('produit.rate',[$produit->id,$i])}}" style="color:orange" title="Donner {{$i}} étoiles">☆</a>
                                     @endfor
                                     
                                </div>
                                
                                
                                    <div class="label-rating" style="display: inline-block">{{$produit->usersRated()}} avis</div>
                                </div>
                                <hr>
                                <div class="mb-3 ">
                                    <var class="price h3 " style="font-weight:bold">
                                   
                                   @if ($produit->faux_percent or $produit->vrai_percent)
                                   <span class="num">{{getprice($produit->prix_vente)}} FCFA</span>
                                   <span>&nbsp;</span>    
                                </span><del class="price-old text-small">{{getprice($produit->prix_barre())}} FCFA</del></span>
                                <span class="p-1 " style="font-size: 12px;color:red;border:1px solid red;border-radius:20px;">-{{$produit->percent()}} %</span>
                                
                                @else
                                   <span class="num">{{getprice($produit->prix_vente)}}F CFA</span>
                                   @endif
                                    </var>
                                </div>
                                <hr>
                                <form action="{{route('panier.store')}}" method="POST">
                                    @if($stock==='Indisponible') <span class="badge badge-pill badge-info d-lg-none" style="">{{$stock =="Indisponible"?$stock:"" }}</span>
                                    @else
                                <div class="row">
                                    <div class="col-sm-5">
                                        <dl class="dlist-inline">
                                            <dt>Quantité  </dt>
                                            <dd>
                                                @csrf
                                                <select name="qte" class="form-control form-control-sm" style="width:70px;">
                                                    @for ($i = 1; $i <= $produit->quantite; $i++)
                                                    <option value="{{$i}}" {{$i==$produit->qty ? 'selected':''}}>{{$i}}</option>
                                                        @endfor	
                                                </select>
                                            </dd>
                                        </dl>
                                        <!-- item-property .// -->
                                    </div>
                                    <!-- col.// -->
                                    <div class="col-sm-7">
                                        <!--<dl class="dlist-inline">
                                            <dt>Taille: </dt>
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
                                         item-property .// -->
                                    </div>
                                    <!-- col.// -->
                                </div>
                                @endif
                                <!-- row.// -->
                               <br><br>
                                    @if($stock==='Indisponible')
                                    
                                    <span id="btn-ajout" data-original-title="article indiponible" class="btn disabled" data-toggle="tooltip" style="background:white;border-color: #002687;color:#002687;"> <i class="fas fa-shopping-cart"></i> Ajouter au panier</span>
                                     <style> #btn-ajout.disabled { opacity: 0.65; cursor: not-allowed;}</style>
                                    @else
                                        @if (!$produit->uniquement_personnalisable)
                                            <button id="btn-ajout" data-original-title="Ajouter au panier" type="submit" class="btn mb-2" data-toggle="tooltip" style="background:white;border-color: #002687;color:#002687;">
                                                <i class="fas fa-shopping-cart"></i> Ajouter au panier</button>
                                                &nbsp;&nbsp;&nbsp; 
                                                @if ($produit->personnalisable)
                                                <a href="{{route('produits.personnalise',[$produit->id])}}" id="btn-ajout" data-original-title="personnaliser" type="button" class="btn mb-2" data-toggle="tooltip" style="background:white;border-color: #002687;color:#002687;">
                                                <i class="fa fa-fire"></i> personnaliser</a>
                                                @endif
                                            @else
                                            <a href="{{route('produits.personnalise',[$produit->id])}}" id="btn-ajout" data-original-title="personnaliser" type="button" class="btn mb-2" data-toggle="tooltip" style="background:white;border-color: #002687;color:#002687;">
                                                <i class="fa fa-fire"></i> personnaliser</a>
                                        @endif
                                    @endif
                                     
                                     
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
                        {!!$produit->description!!}               
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
    <div class="owl-carousel owl-init slide-items col" data-items="{{count($autres_produits)}}" data-margin="20" data-dots="true" data-nav="true" >
            @foreach ($autres_produits as  $produit)
                <div class="item-slide" style="max-width: 350px">
                    <figure class="card card-product">
                    <!--<span class="badge-new"> NEW </span>-->
                    @if($produit->vrai_percent or $produit->faux_percent)
                 <span class="badge-new float-right"> 
                     @php $v=$produit->vrai_percent??$produit->faux_percent;echo "-$v%" @endphp
                    </span>
                @endif
                        @php $liens=$produit->images; $lien=json_decode($liens); $img="img.jpg";
                        if ($lien) { $img=$lien[0]; }  @endphp
                    
                        <div class="img-wrap"> <img src="{{asset('storage/'.$img)}}"> </div>
                        <figcaption class="info-wrap text-center">
                            <h6 class="title text-truncate">
                                <a class="title"href="{{route('produits.show',[$produit->id])}}">{{$produit->nom}}</a></h6>
                                <div class="price-wrap">
                                    <span class="h6 price-new">{{getprice($produit->prix_vente)}} FCFA</span>
                                    @if ($produit->faux_percent or $produit->vrai_percent)
                                    <del class="price-old">{{getprice($produit->prix_barre())}} FCFA</del>
                                    @endif
                                </div>
                        </figcaption>
                    </figure> 
                </div>
            @endforeach
        </div>  
    </div>
</section>
@include('sweetalert::alert')

@stop
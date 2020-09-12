@extends('layouts.app')
@section('title','Accueil')
@section('content')

@include('layouts.slider')

<section class="section-content padding-y-sm bg reveal">
    
    <div class="container d-none ">
        <div class="card " style="height:200px;background:transparent;border:transparent" >
            <a href="{{route('produits.index',["promo"=>1])}}">
                <img class="col-lg-8 offset-lg-2" src="/images/banners/vv.jpg" style="height:200px">
            </a>
        </div>
    </div>
    <div class="card d-lg-none">
        @php
          $categories=App\Categories::inRandomOrder()->take(3)->get();
          @endphp
        <div class="row p-1">
            <center class="col-4 bl-1">
                <a href="{{route('produits.index')}}">
                  <img src="{{asset('images/go.gif')}}" height="80" style="padding:10px;border:1px solid black;border-radius:50%" class="img-bg">
                   <br>
                <span style="font-size: 11px;font-weight:bold;color:black">tous les produits</span>
                </a>
            </center>
            <center class="col-4">
                <a href="{{route('produits.index',['categorie'=>$categories[0]->id])}}">
                <img src="{{asset('storage/'.$categories[0]->logo)}}" height="80" style="padding:10px;border:1px solid black;border-radius:50%" class="img-bg">
                 <br>
              <span style="font-size: 11px;font-weight:bold;color:black">{{$categories[0]->nom}}</span>
                </a>
          </center>
          <center class="col-4">
              <a href="{{route('produits.index',['categorie'=>$categories[1]->id])}}">
                <img src="{{asset('storage/'.$categories[1]->logo)}}" height="80" style="padding:10px;border:1px solid black;border-radius:50%" class="img-bg">
                <br>
                <span style="font-size: 11px;font-weight:bold;color:black">{{$categories[1]->nom}}</span>
            </a>
      </center>
           
        </div>
    </div>
    <div class="card d-none mt-1" style="height:100px;background:transparent;border:transparent;" >
        <a href="{{route('produits.index',["promo"=>1])}}"><img class="" src="/images/banners/vv.jpg" style="height:100px;width:100%"></a>
    </div>
</section>
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
            <a href="{{route('produits.trie','new')}}"  class="btn btn-outline-primary round align-self-center" style="width: 100px;z-index: 999999;border: 2px solid white;font-weight: bold; color: white;">
                Explorer</a>
            <img src="images/banners/h_chemise-motif-carrly.jpg" style="width:100%;height:100%;z-index: -1;" class="img-bg zoom-in d-none d-lg-block">
        </div>
    </article>
    
        </div> <!-- col.// -->
        <div class="col-md-9 reveal-3">
    <ul class="row no-gutters border-cols">
        <!--produits-->
        @foreach ($new_prod as $key => $produit)
        @if ($key==4)
            @break:
        @endif
        <li class="col-6 col-md-3">
            <a href="{{route('produits.show',[$produit->id])}}" class="itembox"> 
                <div class="card-body align-items-center">
                @if($produit->vrai_percent or $produit->faux_percent)
                <span class="badge-new"> 
                    @php $v=$produit->vrai_percent??$produit->faux_percent;echo "-$v%" @endphp
                   </span>
                   @endif
                 @php

                 $liens=$produit->images; $lien=json_decode($liens,true);
                 $img="img.jpg";
                 if ($lien) {
                    foreach($lien as $i){$img=$i;break;}
                 } 
                 //dd($lien);
                 @endphp
                 <center><img class="img-sm" src="storage/{{$img}}"></center>
                <hr>
                <div class="">
                    <center class="word-limit">{{$produit->nom}}</center>
                    <center class="price-wrap h6 price-new">{{getprice($produit->prix_vente)}}F CFA</center>
                </div>
               
                </div>
            </a>
            </li>
        
        @endforeach
    </ul>
    <ul class="row no-gutters border-cols">
        @foreach ($new_prod as $key => $produit)
        @if ($key>=4)
        <li class="col-6 col-md-3">
            
            <a href="{{route('produits.show',[$produit->id])}}" class="itembox"> 
                <div class="card-body align-items-center">
                    @if($produit->vrai_percent or $produit->faux_percent)
                    <span class="badge-new"> 
                        @php $v=$produit->vrai_percent??$produit->faux_percent;echo "-$v%" @endphp
                       </span>
                       @endif
                    @php
                    $liens=$produit->images; $lien=json_decode($liens); $img="img.jpg";
                    if ($lien) { foreach($lien as $i){$img=$i;break;} } 
                    @endphp
                    <center><img class="img-sm" src="storage/{{$img}}"></center>
                   <hr>
                   <div class="">
                       <center class="word-limit">{{$produit->nom}}</center>
                       <center class="price-wrap h6 price-new">{{getprice($produit->prix_vente)}}F CFA</center>
                   </div>
                </div>
            </a>
            </li>
            @endif
        @endforeach
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
            <article href="" class="card-banner h-100 reveal-2"style="background-color: #162A70">
                    <div class="card-body zoom-wrap align-items-center row justify-content-center">
                    <a href="{{route('produits.trie','popular')}}"  class="btn btn-outline-primary round align-self-center" style="width: 100px;z-index: 999999;border: 2px solid white;font-weight: bold; color: white;">
                    Explorer</a>
                <img src="images/banners/shoe.jpg" style="width:100%;height:100%;z-index: -1;" class="img-bg zoom-in d-none d-lg-block">
            </div>
        </article>
            </div> <!-- col.// -->
            <div class="col-md-9 reveal-3">
            <ul class="row no-gutters border-cols">
           @php $cpt=0 @endphp
           @foreach($pop_prod as $key=>$produit)
                
                @if(intval($produit->averageRating)<3)
                    @continue
                @endif
                @php $cpt+=1 @endphp
                @if ($cpt==5)
                    @break
                @endif
                <li class="col-6 col-md-3">
                    <a href="{{route('produits.show',[$produit->id])}}" class="itembox"> 
                        <div class="card-body align-items-center">
                            @if($produit->vrai_percent or $produit->faux_percent)
                 <span class="badge-new"> 
                     @php $v=$produit->vrai_percent??$produit->faux_percent;echo "-$v%" @endphp
                    </span>
                @endif
                            @php
                            $liens=$produit->images; $lien=json_decode($liens);
                            $img="img.jpg";
                            if ($lien) {
                                $img=$lien[0];
                            } 
                            //dd($lien);
                            @endphp
                            <center><img class="img-sm" src="storage/{{$img}}"></center>
                            <hr>
                           <div class="">
                               <center class="word-limit">{{$produit->nom}}</center>
                               <center class="price-wrap h6 price-new">{{getPrice($produit->prix_vente)}}F CFA</center>
                           </div>
                        </div>
                    </a>
                </li>
                
            @endforeach
        </ul>
        <ul class="row no-gutters border-cols">
            @php  $k=$key;$cpt=0 @endphp
            @foreach($pop_prod as $key=>$produit)
                @if($key>$k)
                @if(intval($produit->averageRating)<3)
                    @continue
                @endif
                @php $cpt+=1 @endphp
                @if ($cpt==5)
                    @break
                @endif
                <li class="col-6 col-md-3">
                    <a href="{{route('produits.show',[$produit->id])}}" class="itembox"> 
                        <div class="card-body align-items-center">
                            @if($produit->vrai_percent or $produit->faux_percent)
                 <span class="badge-new"> 
                     @php $v=$produit->vrai_percent??$produit->faux_percent;echo "-$v%" @endphp
                    </span>
                @endif
                <!--<span class="badge-new"> NEW </span>-->
                            @php
                            $liens=$produit->images; $lien=json_decode($liens);
                            $img="img.jpg";
                            if ($lien) {
                               $img=$lien[0];
                            } 
                            //dd($lien);
                            @endphp
                            <center><img class="img-sm" src="storage/{{$img}}"></center>
                           <hr>
                           <div class="">
                               <center class="word-limit">{{$produit->nom}}</center>
                               <center class="price-wrap h6 price-new">{{$produit->getprice()}}F CFA</center>
                           </div>
                    </a>
                </li>
                @endif
                @endforeach
           
        </ul>
            </div> <!-- col.// -->
        </div> <!-- row.// -->
            
        </div> <!-- card.// -->
        
        </div> <!-- container .//  -->
        </section>
    
@stop
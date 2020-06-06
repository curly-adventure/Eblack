@extends('frontend.app')
@section('title','Accueil')
@section('content')

@include('frontend.partials.slider')
@php
function strtoarray($a, $t = ''){
    $arr = [];
    $a = ltrim($a, '[');$a = ltrim($a, 'array(');$a = rtrim($a, ']');$a = rtrim($a, ')');
    $tmpArr = explode(",", $a);
    foreach ($tmpArr as $v) {
        if($t == 'keys'){
            $tmp = explode("=>", $v);
            $k = $tmp[0]; $nv = $tmp[1];$k = trim(trim($k), "'");$k = trim(trim($k), '"');
            $nv = trim(trim($nv), "'");$nv = trim(trim($nv), '"');
            $arr[$k] = $nv;
        } else {
            $v = trim(trim($v), "'");$v = trim(trim($v), '"');
            $arr[] = $v;
        }
    }
    return $arr;
}
@endphp

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
            <a href="{{url('/shop')}}"  class="btn btn-outline-primary round align-self-center" style="width: 100px;z-index: 999999;border: 2px solid white;font-weight: bold; color: white;">
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
            <a href="{{route('detail')}}" class="itembox"> 
                <div class="card-body align-items-center">
                <div class="">
                    <center class="word-limit ">{{$produit->nom}}</center>
                    <center class="price-wrap h6 price-new">{{$produit->prix_vente}}F CFA</center>
                </div>
                <hr>
                <center>
                    
                    <!--<span class="badge-new float-right"> NEW </span>-->
                    @php
                        $liens=$produit->images;
                        //$str_arr = preg_split ("/\,/", $liens);
                        //$a=$str_arr[1];
                        //eval("\$liens = \"$liens\";"); 
                        //$lien0 = strstr($liens, ',', true);
                        //$lien = substr($a, 2,-2);
                        $v=strtoarray($liens)[0];
                        //dd($v);
                    @endphp
                    <img class="img-sm" src="storage/{{$v}}">
                </center>
                </div>
            </a>
            </li>
        
        @endforeach
    </ul>
    
    <ul class="row no-gutters border-cols">
        @foreach ($new_prod as $key => $produit)
        @if ($key>=4)
       
    
        <li class="col-6 col-md-3">
            <a href="{{route('detail')}}" class="itembox"> 
                <div class="card-body align-items-center">
                <div class="">
                    <center class="word-limit ">{{$produit->nom}}</center>
                    <center class="price-wrap h6 price-new">{{$produit->prix_vente}}F CFA</center>
                </div>
                <hr>
                <center>
                    @php
                        $liens=$produit->images;
                        $v=strtoarray($liens)[0];
                    @endphp
                    <img class="img-sm" src="storage/{{$v}}">
                </center>
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
            <article href="#" class="card-banner h-100 reveal-2"style="background-color: #162A70">
                    <div class="card-body zoom-wrap align-items-center row justify-content-center">
                    <a href="{{url('/shop')}}"  class="btn btn-outline-primary round align-self-center" style="width: 100px;z-index: 999999;border: 2px solid white;font-weight: bold; color: white;">
                    Explorer</a>
                <img src="images/banners/shoe.jpg" style="width:100%;height:100%;z-index: -1;" class="img-bg zoom-in d-none d-lg-block">
            </div>
        </article>
            </div> <!-- col.// -->
            <div class="col-md-9 reveal-3">
            <ul class="row no-gutters border-cols">
           
           @foreach($pop_prod as $key=>$produit)
                @if($key==4)
                    
                @break
                @endif
                <li class="col-6 col-md-3">
                    <a href="{{route('detail')}}" class="itembox"> 
                        <div class="card-body align-items-center">
                        <div class="">
                            <center class="word-limit ">{{$produit->nom}}</center>
                            <div class="price-wrap" style="font-size: 15px;font-weight: bold;text-align: center;">
                                <span class="price-new">{{$produit->prix_vente}} CFA</span> <del class="price-old ">{{$produit->prix_achat}} CFA</del>
                            </div>
                        </div>
                        <hr>
                        <center>
                            @php
                        $liens=$produit->images;
                        $v=strtoarray($liens)[0];
                    @endphp
                    <img class="img-sm" src="storage/{{$v}}">
                        </center>
                        </div>
                    </a>
                </li>
                
            @endforeach
        </ul>
        <ul class="row no-gutters border-cols">
            @foreach($pop_prod as $key=>$produit)
                @if($key>=4)
                
                <li class="col-6 col-md-3">
                    <a href="{{route('detail')}}" class="itembox"> 
                        <div class="card-body align-items-center">
                        <div class="">
                            <center class="word-limit ">{{$produit->nom}}</center>
                            <div class="price-wrap" style="font-size: 15px;font-weight: bold;text-align: center;">
                                <span class="price-new">{{$produit->prix_vente}} FCFA</span> <del class="price-old ">{{$produit->prix_achat}} FCFA</del>
                            </div>
                        </div>
                        <hr>
                        <center>
                            @php
                            $liens=$produit->images;
                            $v=strtoarray($liens)[0];
                        @endphp
                        <img class="img-sm" src="storage/{{$v}}">
                        </center>
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
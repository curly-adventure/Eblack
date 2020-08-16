@extends('layouts.app')
@section('title','detail produit')
@section('content')
<section class="section-content bg padding-y border-top" style="padding-top: 80px;">

    <div class="col" >
        <nav class="col-md-18-24">
           <br>
           <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL('/')}}">Accueil</a></li>
            
            @foreach ($lien as  $item=>$i)
             
            @if ($item=="personnalisable") <li class="breadcrumb-item"><a href="{{route($i,['personnalisable'=>1])}}">{{$item}}</a></li>
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
                        <aside class="col-sm-4 border-right">
                            <article class="gallery-wrap">
                                
                                <div class="img-big-wrap">
                                    @php $liens=$produit->images; $lien=json_decode($liens); $img="img.jpg";
                                    if ($lien) { $img=$lien[0]; }  @endphp
                                    <div>
                                        <a id="item-display" href="{{asset('storage/'.$img)}}" data-fancybox=""><img id="display" class="img-fluid" src="{{asset('storage/'.$img)}}" style="max-height:300px"></a>
                                    </div>
                                </div>

                                
                            </article>
                            <!-- gallery-wrap .end// -->
                        </aside>
                        <aside class="col-sm-8">
                            
                            <article class="p-5">
                                <h3 class="title mb-3">{{$produit->nom}}</h3>
                                <var class="price h5 " style="font-weight:bold">
                                    <span class="num">{{getprice($produit->prix_vente)}}F CFA</span>
                                </var>
                                <br> 
                                <hr>
                                <div class="mb-3">
                                    <p>
                                        Vous pouvez personnaliser cet article uniquement par l'ajout d'un nouveau texte et par le choix d'une couleur !
                                    </p>
                                </div>
                                <hr>
                                <form action="{{route('panier.store')}}" method="POST">
                                    @if($stock==='Indisponible') <span class="badge badge-pill badge-info d-lg-none" style="">{{$stock =="Indisponible"?$stock:"" }}</span>
                                    @else
                                <div class="row">
                                    <div class="col-sm-4 mb-2">
                                        @csrf
                                        <input type="text" name="texte" id="txt" placeholder="entrez votre texte ..." style="width: 100%">
                                    </div>
                                    <!-- col.// -->
                                    <div class="col-sm-4">
                                        
                                        @csrf
                                       <select name="couleur" id="" class="form-control form-control-sm mb-3" style="width:100%;height:35px;font-size:15px">
                                        <option disabled selected>choisissez une couleur</option>   
                                        <option value="blanche">blanche</option>
                                           <option value="noir">noir</option>
                                           <option value="bleu">bleu</option>
                                           <option value="orange">orange</option>
                                           <option value="vert">vert</option>
                                       </select>
                                     
                                    </div>
                                    <div class="col-sm-4">
                                        <dl class="dlist-inline">
                                            <dt>Quantité : </dt>
                                            <dd>
                                                @csrf
                                                <select name="qte" class="form-control form-control-sm" style="width:100px;">
                                                    @for ($i = 1; $i <= $produit->quantite; $i++)
                                                    <option value="{{$i}}" {{$i==$produit->qty ? 'selected':''}}>{{$i}}</option>
                                                        @endfor	
                                                </select>
                                            </dd>
                                        </dl>
                                     </div>
                                    <!-- col.// -->
                                </div>
                                @endif
                                <!-- row.// -->
                               <br><br>
                                    @if($stock==='Indisponible')
                                    
                                    <span id="btn-ajout" data-original-title="article indiponible" class="btn disabled" data-toggle="tooltip" style="background:white;border-color: #002687;color:#002687;"> <i class="fas fa-shopping-cart"></i> Ajouter au panier</span>
                                     <style> #btn-ajout.disabled { opacity: 0.65; cursor: not-allowed;}</style>
                                <span class="badge badge-pill badge-info float-right d-none d-lg-block" style="margin-right: 45%;">{{$stock =="Indisponible"?$stock:"" }}</span>
                                   
                                     @else
                                   
                                    <button id="btn-ajout" data-original-title="Ajouter au panier" type="submit" class="btn mb-3" data-toggle="tooltip" style="background:white;border-color: #002687;color:#002687;">
                                        <i class="fas fa-shopping-cart"></i> Ajouter au panier</button>
                                        <a href="{{route('produits.personnalise.annuler',[$produit->id])}}" id="btn-ajout" data-original-title="personnaliser" type="button" class="btn mb-3" data-toggle="tooltip" style="background:white;border-color: #002687;color:#002687;">
                                             annuler</a>
                                    @endif
                                     
                                    @csrf
                                    <input type="hidden" name="produit_id" value="{{$produit->id}}">
                                    <input type="hidden" name="personnaliser" value="true">
                                    {{--<input type="hidden" name="prix" value="{{$produit->prix_vente}}">--}}
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
                                <a class="title"href="{{route('produits.personnalise',[$produit->id])}}">{{$produit->nom}}</a></h6>
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
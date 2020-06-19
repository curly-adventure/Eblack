@extends('frontend.app')
@section('title','shop')
@section('content')
<section class="section-content bg padding-y-sm" >
	<style>
		.btn{border:1px solid #002687;color:black;background-color: white}
		footer .btn{border:none;background:transparent}
	</style>
	<div class="container" style="margin-top:100px">
		<div class="row">
			<nav class="col-md-18-24"> 
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">Accueil</a></li>
					<li class="breadcrumb-item"><a href="#">categories</a></li>
					<li class="breadcrumb-item"><a href="#">Sous categories</a></li>
					<li class="breadcrumb-item active" aria-current="page">produits</li>
				</ol>
			</nav> <!-- col.// -->
		</div>
		 <!-- row.// -->
		<div class="container">
			<figure class="mt-3 banner p-3 ">
				<div class="text-lg text-center " id="titre-cate">Casque audio & ecouteur</div>
			</figure>	
		</div>
		<div class="card d-none d-lg-block" style="padding:20px;margin-bottom: 10px;" >
			<div class="row">
			<div class="col-lg-8 float-left">
				<strong class="">Filtrer par</strong>
				
					<ul class="list-inline">
					  <div class="btn-group">
		  <button style="background-color: white" type="button" class="btn  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			categorie
		  </button>
		  <ul class="btn dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
			<li><a class="dropdown-item" href="{{route('produits.index')}}">Tout Afficher</a></li>
			<div class="dropdown-divider"></div>
			@foreach (App\Categories::All() as $categorie)
			  <li><a class="dropdown-item" href="{{route('produits.index',['categorie'=>$categorie->id])}}">{{$categorie->nom}}</a></li>
			  
			@endforeach
		  </ul>
		</div>
					
					 <div class="btn-group">
		  <button style="background-color: white" type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			couleur
		  </button>
		  <div class="dropdown-menu">
			<a class="dropdown-item" href="#">tout afficher</a>
			<div class="dropdown-divider"></div>
			<a class="dropdown-item" href="#">bleu</a>
			<a class="dropdown-item" href="#">blanc</a>
			<a class="dropdown-item" href="#">orange</a>
			
		  </div>
		</div>
					  <div class="btn-group">
		  <button style="background-color: white" type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			taille
		  </button>
		  <div class="dropdown-menu">
			<a class="dropdown-item" href="#">tout afficher</a>
			<div class="dropdown-divider"></div>
			<a class="dropdown-item" href="#">M</a>
			<a class="dropdown-item" href="#">X</a>
			<a class="dropdown-item" href="#">XL</a>
			<a class="dropdown-item" href="#">XXL</a>
		  </div>
		</div>
					</ul>
			</div>
			<div class="col-4 ">
				<strong class="">Trier par</strong>
				<select style="border-color:#002687;background-color:white"class="mr-2 form-control" >
						<option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">popularité</font></font></option>
						<option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">prix : moins chere au plus chere</font></font></option>
						<option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">prix : plus chere au moins chere</font></font></option>
						<option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ordre Alphabetique</font></font></option>
						<option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">plus ancien au plus recent</font></font></option>
						<option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">plus recent au plus ancien</font></font></option>
					
				</select>
			</div>
			</div>
		</div>
	<div class="card d-lg-none" style="padding:20px;margin-bottom: 10px;" >
	<div class="row">
	<div class="col-8 offset-2">
	<strong class="">Trier par</strong>
	<select style="border-color:#002687;background-color:white" class="mr-2 form-control" >
		<option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">popularité</font></font></option>
		<option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">moins chere au plus chere</font></font></option>
		<option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">plus chere au moins chere</font></font></option>
		<option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ordre Alphabetique</font></font></option>
		<option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">plus ancien au plus recent</font></font></option>
		<option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">plus recent au plus ancien</font></font></option>
	</select>
	</div> <!-- row.// -->
	</div>
	</div> <!-- card.// -->
	<header class="mb-3">
		<div class="form-inline">
			<strong class="mr-md-auto">{{$products->total()}} produits trouvés </strong>
			<div class="btn-group  d-none d-lg-block">
				<a href="" class="btn btn-light active" data-toggle="tooltip" title="" data-original-title="affichage grid"> 
					<i class="fa fa-th"></i></a>
				<a href="#" class="btn btn-light " data-toggle="tooltip" title="" data-original-title="affichage liste"> 
					<i class="fa fa-bars"></i></a>
				
			</div>
		</div>
</header>
	
	<div class="row-sm">
		@foreach ($products as $key => $produit)
		<div class="col-md-3 col-sm-6">
			<figure class="card card-product">
				
				<div class="img-wrap img-fluid"> 
				@php
					$liens=$produit->images; $lien=json_decode($liens);
					//dd($lien);
				@endphp
				<img src="storage/{{$lien[0]}}" style="width:50%;object-fit: cover"></div>
				<figcaption class="info-wrap text-center">
					<a href="{{route('produits.show',[$produit->id])}}" class="title">{{$produit->nom}}</a>
					<div class="price-wrap">
						<span class="h6 price-new">{{$produit->prix_vente}} FCFA</span>
						<del class="price-old">{{$produit->prix_achat}} FCFA</del>
						{{--URL::action('ProduitsController@show',$produit->id)--}}
					</div><a href="{{route('produits.show',[$produit->id])}}"><button type="button" class="btn ">acheter</button></a>
				</figcaption>
	
			</figure> <!-- card // -->
		</div>
	@endforeach


	<nav class="mb-4" aria-label="Page navigation sample">
		<ul class="pagination">
		 <!-- <li class="page-item disabled"><a class="page-link" href="#">Precedant</a></li>-->
		  {{ $products->appends(request()->input())->links() }}
		  <!--<li class="page-item"><a class="page-link" href="#">suivant</a></li>-->
		</ul>
	  </nav>

	  
	</div><!-- container // -->
	<div class="box text-center">
		<p>As-tu trouvé ce que tu cherchais？</p>
		<a href="" class="btn btn-light">Oui</a>
		<a href="" class="btn btn-light">Non</a>
	</div>
	</section>
@stop
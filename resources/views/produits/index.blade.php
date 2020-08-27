@extends('layouts.app')
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
					<li class="breadcrumb-item"><a href="{{URL('/')}}">Accueil</a></li>
					
					@foreach ($lien as  $item=>$i)

						@if ($item==$titre)
							<li class="breadcrumb-item"><a href="{{route($i,['categorie'=>request()->categorie,'souscategorie'=>request()->souscategorie])}}">{{$item}}</a></li>
						@else	
							<li class="breadcrumb-item"><a href="{{route($i,['categorie'=>request()->categorie])}}">{{$item}}</a></li>
						@endif	

					@endforeach
				</ol>
			</nav> 
		</div>

		<div class="container">
			<figure class="mt-3 mb-3 banner ">
				<div class=" text-center " id="titre-cate" style="text-transform: capitalize;">{{$titre}}</div>
			</figure>	
		</div>
		<div class="card d-none d-lg-block" style="padding:20px;margin-bottom: 10px;" >
			<div class="row">
			<div class="col-lg-8 float-left">
				<strong class="">Filtrer par</strong>
					<ul class="list-inline">
					  <div class="btn-group">
		  			 <button style="background-color: white" type="button" class="btn  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					categorie</button>
					<ul class="btn dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
					<li><a class="dropdown-item" href="{{route('produits.index')}}">Tout Afficher</a></li>
					<div class="dropdown-divider"></div>
					@foreach (App\Categories::All() as $categorie)
					<li><a class="dropdown-item" href="{{route('produits.index',['categorie'=>$categorie->id])}}">{{$categorie->nom}}</a></li>
					@endforeach
					@foreach ($categorie->sousCategories as $souscategorie)
					<li><a class="dropdown-item" href="{{route('produits.index',['souscategorie'=>$souscategorie->id])}}">{{$souscategorie->nom}}</a></li>
					@endforeach
				</ul>
			</div>
					
		<!--<div class="btn-group">
		  <button style="background-color: white" type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			marque
		  </button>
		  <div class="dropdown-menu">
			<a class="dropdown-item" href="{{route('produits.index')}}">tout afficher</a>
			<div class="dropdown-divider"></div>
			@foreach (App\Marque::All() as $marque)
			<a class="dropdown-item" href="{{route('produits.index',['marque'=>$marque->id])}}">{{$marque->nom}}</a>
			@endforeach
			</div>
		</div>-->
			</ul>
			</div>
			<div class="col-4">
				@php
					$categorie_id=request()->categorie;
					$souscategorie_id=request()->souscategorie;
					$marque_id=request()->marque;
				@endphp
				<strong class="">Trier par</strong>
				<form action="{{route('produits.index',['categorie'=>$categorie_id,'souscategorie'=>$souscategorie_id])}}" method="GET" >
				<select onchange='this.form.submit()' name='trie' style="border-color:#002687;background-color:white"class="mr-2 form-control" >
					{{--<option value="1">Popularité</option>--}}
					<option value="0">--selectionnez un critère--</option>
					<option value="1">Nouveauté</option>
					<option value="2">prix croissant</option>
					<option value="3">prix decroissant</option>
					<option value="4">personnalisable</option>

					{{--<option value="5"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ordre alphabetique</font></font></option>--}}
				</select>
				<input type="hidden" name="categorie" value="{{$categorie_id}}">
				<input type="hidden" name="souscategorie" value="{{$souscategorie_id}}">
				
			</form>
			</div>
			</div>
		</div>
	<div class="card d-lg-none" style="padding:20px;margin-bottom: 10px;" >
	<div class="row">
		<div class="col-5">
			<strong class="">Filtrer par</strong>
			
			<ul class="list-inline">
				<div class="btn-group">
		  			<button style="background-color: white" type="button" class="btn  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					categorie</button>
					
					<ul class="btn dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
						<li><a class="dropdown-item" href="{{route('produits.index')}}">Tout Afficher</a></li>
						<div class="dropdown-divider"></div>
						@foreach (App\Categories::All() as $categorie)
						<li><a class="dropdown-item" href="{{route('produits.index',['categorie'=>$categorie->id])}}">{{$categorie->nom}}</a></li>
						@endforeach
						@foreach ($categorie->sousCategories as $souscategorie)
						<li><a class="dropdown-item" href="{{route('produits.index',['souscategorie'=>$souscategorie->id])}}">{{$souscategorie->nom}}</a></li>
						@endforeach
					</ul>
				</div>
			</ul>
		</div>
			
	<div class="col-7">
	<strong class="">Trier par</strong>
	<select style="border-color:#002687;background-color:white" class="mr-2 form-control" >
		<option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">popularité</font></font></option>
		<option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">nouveauté</font></font></option>
		<option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">prix : moins chere au plus chere</font></font></option>
		<option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">prix : plus chere au moins chere</font></font></option>
		<option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ordre alphabetique</font></font></option>
	</select>
	</div> <!-- row.// -->
	</div>
	</div> <!-- card.// -->
	<header class="mb-3">
		<div class="form-inline">
			<strong class="mr-md-auto">{{$products->total()}} produits trouvés </strong>
			<!--<div class="btn-group  d-none d-lg-block">
				<a href="" class="btn btn-light active" data-toggle="tooltip" title="" data-original-title="affichage grid"> 
					<i class="fa fa-th"></i></a>
				<a href="#" class="btn btn-light " data-toggle="tooltip" title="" data-original-title="affichage liste"> 
					<i class="fa fa-bars"></i></a>
			</div>-->
		</div>
</header>
	<div class="row-sm">
		@foreach ($products as $key => $produit)
		<div class="col-md-3 col-sm-6">
			<figure class="card card-product">
				@if($produit->vrai_percent or $produit->faux_percent)
                 <span class="badge-new float-right"> 
                     @php $v=$produit->vrai_percent??$produit->faux_percent;echo "-$v%" @endphp
                    </span>
                @endif
				<div class="img-wrap img-fluid"> 
				    @php $liens=$produit->images; $lien=json_decode($liens); $img="img.jpg";
                        if ($lien) { $img=$lien[0]; }  @endphp
				<img src="{{asset('storage/'.$img)}}" style="width:50%;object-fit: cover"></div>
				<figcaption class="info-wrap text-center">
					<a href="{{route('produits.show',[$produit->id])}}" class="title">{{$produit->nom}}</a>
					<div class="price-wrap">
						<span class="h6 price-new">{{$produit->getprice()}} FCFA</span>
						@php $d=$produit->prix_barre()?"":"d-none";@endphp
						<del class="price-old {{$d}}">{{getprice($produit->prix_barre())}} FCFA</del>
						{{--URL::action('ProduitsController@show',$produit->id)--}}
					</div><a href="{{route('produits.show',[$produit->id])}}"><button type="button" class="btn ">acheter</button></a>
				</figcaption>
	
			</figure> <!-- card // -->
		</div>
	@endforeach

	</div><!-- container // -->
	<nav class="mb-4" aria-label="Page navigation">
		<ul class="pagination">
		 <!-- <li class="page-item disabled"><a class="page-link" href="#">Precedant</a></li>-->
		  {{ $products->appends(request()->input())->links() }}
		  <!--<li class="page-item"><a class="page-link" href="#">suivant</a></li>-->
		</ul>
	  </nav>
	<div id="html">
	<div class="box text-center">
		<p>Avez-vous trouvez ce que vous cherchez？</p>
		<button class="btn btn-light" onclick="alert('merci de nous faire confiance !\nEblack, le choix de la qualité')">Oui</button>
		<button type="button" data-toggle="modal" data-target="#form" class="btn btn-light">Non</button>
	</div>
	<div class="modal fade" id="form">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Que recherchez vous ?</h4>
					<button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body row">
					<form action="{{route('client.demande')}}" class="col" method="POST">
						@csrf
						<div class="form-group">
							<label for="nom" class="form-control-label">Nom</label>
							<input type="text" name="nom" class="form-control" id="nom"placeholder="entrez votre nom">
						</div>
						<div class="form-group">
							<label for="tel" class="form-control-label">Numero</label>
							<input type="text" name="tel" class="form-control" id="tel"placeholder="entrez votre numero">
						</div>
						<div class="form-group">
							<label for="detail" class="form-control-label">description</label>
							<textarea name="detail" id="desc" cols="50" rows="5" placeholder="entrez les details du produit que vous rechercher"></textarea>
						</div>
						<button class="btn btn-outline-primary pull-right" type="submit">Envoyer</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

	</section>
	@include('sweetalert::alert')
@stop
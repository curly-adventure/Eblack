@extends(backpack_view('blank'))

@section('content-header')
	<section class="content-header">
	  <h1>
	    <span>{{ $crud->entity_name }}</span>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="{{ url(config('backpack.base.route_prefix'), 'dashboard') }}">{{ trans('backpack::crud.admin') }}</a></li>
	    <li><a href="{{ url($crud->route) }}" class="text-capitalize">{{ $crud->entity_name_plural }}</a></li>
	    <li class="active">{{ trans('backpack::crud.preview') }}</li>
	  </ol>
	</section>
@endsection

@section('content')
	@if ($crud->hasAccess('list'))
		<a href="{{ url($crud->route) }}"><i class="la la-angle-double-left"></i> {{ trans('backpack::crud.back_to_all') }} <span>{{ $crud->entity_name_plural }}</span></a><br><br>
	@endif

	<div class="row p-2 b-t-2 b-b-2" style="background: white">
		<div class="col-md-12 well">
			<h2>Commande n ° {{ $order->num_achat }}</h2>
		</div>
	</div>

	<div class="row  mt-3" >
		<div class="col-md-7">
			<div class="box p-2 b-t-2 b-b-2" style="background: white">
			    <div class="box-header with-border">
			      <h5 class="box-title">
		            <h4><i style="color: red" class="la la-ticket"></i> Status de la commande</h4>
		          </h5>
			    </div>
			    <div class="box-body ml-2">
					@php
						switch ($order->status->nom) {
							case 'Attente':
								$back="rgb(58, 230, 59)";
								$nom="En attente de confirmation";
							break;
							case 'Traitement':
							$back="orange";
							$nom="En cour de confirmation";
							break;
							case 'Livrer':
							$back="blue";
							$nom="Commande Livrer";
							break;
							case 'Terminer':
							$back="blue";
							$nom="Terminé";
							break;
							case 'Annuler':
							$back="red";
							$nom="Commande annuler";
							break;
							default:
							$back="blue";
							$nom="";
							break;
						}
					@endphp
					<span><i class="la la-info-circle mt-2" style="color:{{$back}}"></i></span>
					<span>{{ $nom }}</span>
			    	
					<hr>

					
					<form action="{{ route('updateOrderStatus') }}" method="POST">
						{!! csrf_field() !!}
						<input type="hidden" name="order_id" value="{{ $order->id }}">
						<input type="hidden" name="orderStatus" value="{{$order->status->id}}">
						<div class="form-group">
							<select name="status_id" id="status_id" class="select2_field" style="width: 100%">
								@foreach($orderStatuses as $orderStatus)
									<option value="{{ $orderStatus->id }}"
										@if ($orderStatus->nom==$order->status->nom) selected @endif
										>{{ $orderStatus->nom }}</option>
								@endforeach
							</select>
						</div>
						<button type="submit" class="btn btn-primary">{{ "mettre a jour" }}</button>
					</form>
					
			    </div>
		    </div>
		</div>
		<div class="col-md-5">
			<div class="box p-2 b-t-2 b-b-2" style="background: white">
			    <div class="box-header with-border">
			      <h3 class="box-title">
		            <span><i class="la la-user"></i> {{ 'Client' }}</span>
		          </h3>
			    </div>

			    <div class="box-body">
			    	
					<div class="col-md-12 well">
						<div class="col-md-12">
							<span><i class="la la-user-circle-o"></i> {{ $order->client->nom }}  {{ $order->client->prenom }}</span> <br/>
							<span><i class="la la-phone"></i> {{ $order->client->numero }} </span><br/>
							<span><i class="la la-envelope"></i> <a href="mailto:{{ $order->client->email }}">{{ $order->client->email }}</a></span> <br/>
						</div>
						
					</div>
			    </div>
		    </div>

		    <div class="box p-2 b-t-2 b-b-2" style="background: white">
			    <div class="box-header with-border">
			      <h3 class="box-title">
		            <span><i class="la la-user"></i> Adresse</span>
		          </h3>
			    </div>

			    <div class="box-body col-md-12 well">
					<span>{{$adresse->description}}</span> <br>
					@php
						$commune = \App\Commune::where('id', $adresse->commune_id)->first();
						$ville = \App\Ville::where('id', $commune->ville_id)->first();
					@endphp
					<span>
						{{$commune->nom }} ,
						{{$ville->nom}}
					</span>
			    </div>
		    </div>
		</div>
	</div>


	<div class="row">
		<div class="col-md-12">
			<div class="box p-2 b-t-2 b-b-2" style="background: white">
			    <div class="box-header with-border">
			      <h3 class="box-title">
		            <span><i class="fa fa-shopping-cart"></i>  Produits </span>
		          </h3>
			    </div>

			    <div class="box-body">
			    	<div class="col-md-12">
				    	<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th>Produit</th>
									<th>Prix</th>
									<th>Quantite</th>
								</tr>
							</thead>
							<tbody>
								@php
									$produits=\App\AchatProduit::all()->where('achat_id',$order->id);
								@endphp
								@foreach($produits as $product)
									<tr>
										<td class="vertical-align-middle">
											<a href="">{{ $product->nom }}</a><br/>
										</td>
										<td class="vertical-align-middle">{{ $product->prix }}</td>
										<td class="vertical-align-middle">{{ $product->quantite }}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>

					<div class="col-md-6 col-md-offset-6">
						<table class="table table-condensed b-">
							
							<tr>
								<td class=""><strong>TOTAL : </strong></td>
								<td class=""><strong>{{$order->montant}} FCFA</strong></td>
							</tr>
						</table>
					</div>

			    </div>
		    </div>
		</div>
	</div>
@endsection


@section('after_styles')
	<link rel="stylesheet" href="{{ asset('vendor/backpack/crud/css/crud.css') }}">
	<link rel="stylesheet" href="{{ asset('vendor/backpack/crud/css/show.css') }}">

	<!-- include select2 css-->
	<link href="{{ asset('vendor/adminlte/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />

	<!-- Select 2 Bootstrap theme -->
	<link href="{{ asset('css/select2-bootstrap-min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('after_scripts')
	<script src="{{ asset('vendor/backpack/crud/js/crud.js') }}"></script>
	<script src="{{ asset('vendor/backpack/crud/js/show.js') }}"></script>

	<!-- include select2 js -->
    <script src="{{ asset('vendor/adminlte/plugins/select2/select2.min.js') }}"></script>

	<script>
		$(document).ready(function () {
			@if (count($orderStatuses) > 0)
				$('.select2_field').select2({
                            theme: "bootstrap"
                        });
			@endif
		});
	</script>
@endsection
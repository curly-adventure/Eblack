@extends('frontend.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                  
                        @foreach (Auth()->user()->commandes as $item)
                            <div class="card">
                                <div class="card-header">
            Commande passer le {{ Carbon\Carbon::parse($item->paiement_created_at)->format('d/m/Y a H:i')}}
                                d'un montant de <strong>{{$item->montant}}</strong>
                                </div>
                                <div class="card-body">
                                    <h5>liste des produits</h5>
                                    @foreach (unserialize($item->produits) as $produit)
                                        <div>nom du produit : {{$produit[0]}}</div>
                                        <div>prix :  {{$produit[1]}}</div>
                                        <div>Quantité :  {{$produit[2]}}</div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</div>
@include('sweetalert::alert')
@endsection

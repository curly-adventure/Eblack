@extends('frontend/app')
@section('title','panier')

@section('extra-meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
@if (Cart::count()>0)
{{-- affichage du panier pour ecran large  --}}
<section class="section-content d-none d-lg-block bg padding-y border-top" >
    <div class="container" style=" margin-top:80px;">
      <center><p class="h3"style="color: #888;font-weight:bold;">VOTRE PANIER ( {{Cart::count()}} )</p></center><br>
    
    <div class="row">
        <main class="col-sm-9">
    
    <div class="card">
    <table class="table table-hover shopping-cart-wrap">
    <thead class="text-muted">
    <tr>
      <th scope="col">PRODUIT</th>
      <th scope="col" width="100">QUANTITE</th>
      <th scope="col" width="140">SOUS-TOTAL</th>
      <th scope="col" class="text-right" width="200">ACTION</th>
    </tr>
    </thead>
    <tbody>
        @foreach (Cart::content() as $produit)
        <tr>
            <td>
            <figure class="media">
                @php $liens=$produit->model->images; $lien=json_decode($liens); @endphp
                <div class="img-wrap"><img src="{{asset('storage/'.$lien[0])}}" class="img-thumbnail img-sm"></div>
                <figcaption class="media-body">
                    <h6 class="title text-truncate">{{$produit->model->nom}}</h6>
                    <dl class="dlist-inline small">
                    <dt>Taille: </dt>
                    <dd>XXL</dd>
                    </dl>
                    
                </figcaption>
            </figure> 
            </td>
            <td> 
            <select name="qty" id="qty" data-id="{{$produit->rowId}}" class="custom-select">
                    @for ($i = 1; $i <= 6; $i++)
            <option value="{{$i}}" {{$i==$produit->qty ? 'selected':''}}>{{$i}}</option>
                    @endfor	
                </select> 
            </td>
            <td> 
                <div class="price-wrap"> 
                    <var class="price"style="color:#002687; ">{{$produit->subtotal()}} FCFA</var> 
                    
                </div> <!-- price-wrap .// -->
            </td>
            <td class="text-right"> 
            <form action="{{route('panier.supprime',$produit->rowId)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">× Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    
    
    </tbody>
    </table>
    <div class="card-body border-top">
        <a href="{{route('paiement.stripe')}}" class="btn btn-light float-md-right"style="font-weight:bold;font-size:18px" > Finaliser la commande &nbsp;<i class="fa fa-chevron-right" style="color: #002687"></i> </a>
        <a href="{{route('produits.index')}}" class="btn btn-light" style="font-weight:bold;font-size:18px"> <i class="fa fa-chevron-left" style="color: #002687"></i> &nbsp;Continuer ses achats </a>
    </div>
    </div> <!-- card.// -->
    <div class="alert alert-success mt-3 p-1 pl-5 ">
        <p class="icontext" style="font-weight: bold"><i class="icon text-success fa fa-truck"></i>&nbsp;Livraison gratuite pour un achat superieur a 20000 fr</p>
    </div>
        </main> <!-- col.// -->
        <aside class="col-md-3">
            <div class="card mb-3">
                <div class="card-body">
                <form>
                    <div class="form-group">
                        <label>coupon ?</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="" placeholder="code coupon">
                            <span class="input-group-append"> 
                                <button class="btn btn-primary" style="border:none;background-color: #002687">appliquer</button>
                            </span>
                        </div>
                    </div>
                </form>
                </div> <!-- card-body.// -->
            </div>  <!-- card .// -->
            <div class="card">
                <div class="card-body">
                        <dl class="dlist-align">
                          <dt>Prix Total:</dt>
                          <dd class="text-right">{{Cart::subtotal()}} FCFA</dd>
                        </dl>
                       
                        <hr>
                        <figure class="itemside mb-3">
                            <aside class="aside"><img src="{{asset('images/icons/logo-jpay-card.png')}}"></aside>
                            <aside class="aside"><img src="{{asset('images/icons/ompay-ci.png')}}"></aside>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <aside class="aside"><img src="{{asset('images/icons/momo.png')}}"></aside>
                          </figure>
                        
                </div> <!-- card-body.// -->
            </div>  <!-- card .// -->
        </aside> 
    </div>
    
    </div> <!-- container .//  -->
    </section>
    <section class="section-content d-block d-lg-none bg padding-y border-top" >
        <div class="container" style=" margin-top:90px;">
          <center><p class="h5"style="color: #888;font-weight:bold;">VOTRE PANIER ( {{Cart::count()}} )</p></center><br>
        
         <main class="col-sm-9">
        
            <div class="card">
                <figure class="media">
                    @php $liens=$produit->model->images; $lien=json_decode($liens); @endphp
                    <div class="img-wrap"><img src="{{asset('storage/'.$lien[0])}}" class="img-thumbnail img-sm"></div>
                    <figcaption class="media-body">
                        <h6 class="title text-truncate">{{$produit->model->nom}}</h6>
                        <dl class="dlist-inline small">
                        <dt>Taille: </dt>
                        <dd>XXL</dd>
                        </dl>
                        
                    </figcaption>
                </figure>
                <div class="card-body border-top">
                    <a href="#" class="btn btn-light float-md-right"style="font-weight:bold;font-size:18px" > Finaliser la commande &nbsp;<i class="fa fa-chevron-right" style="color: #002687"></i> </a>
                    <a href="#" class="btn btn-light" style="font-weight:bold;font-size:18px"> <i class="fa fa-chevron-left" style="color: #002687"></i> &nbsp;Continuer ses achats </a>
                </div>
            </div>
            
         </main>

        </div>
    </section>
    
    @else
    <section class="section-content bg padding-y border-top" style="height: 60vh">
        <div class="container" style=" margin-top:100px;">
          
            <center><p class="h3"style="font-weight:bold;">VOTRE PANIER EST VIDE</p><br>
                <p>ajouter des produits dans votre panier</p>
                <div class="col-md-6 mt-4 ">
                    <a href="{{route('produits.index')}}" class="btn btn-success btn-lg btn-block" type="button" style="background-color: #002687;color: white;border:none">passez aux achats !</a>
                </div>
            </center>
        </div>
    </section>
    @endif

    @endsection

@section('extra-js')
<script>
    var qty = document.querySelectorAll('#qty');
    Array.from(qty).forEach((element) => {
        element.addEventListener('change', function () {
            var rowId = element.getAttribute('data-id');
            var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            fetch(`/panier/${rowId}`,
                {
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json, text-plain, */*",
                        "X-Requested-With": "XMLHttpRequest",
                        "X-CSRF-TOKEN": token
                    },
                    method: 'patch',
                    body: JSON.stringify({
                        qty: this.value
                    })
            }).then((data) => {
                console.log(data);
                location.reload();
            }).catch((error) => {
                console.log(error);
            });
        });
    });
</script>
@include('sweetalert::alert')
@endsection
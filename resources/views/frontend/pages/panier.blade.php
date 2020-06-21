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
    </div> <!-- card.// -->
    
        </main> <!-- col.// -->
        <aside class="col-sm-3">
    <p class="alert alert-primary" style="background-color: #002687 ;"> </p>
    
    <dl class="dlist-align h4">
      <dt>Total:</dt>
      <dd class="text"><strong>{{Cart::subtotal()}}</strong></dd>
    </dl>
    <hr>
    mode de paiement possible <br> <br>
    <figure class="itemside mb-3">
      <aside class="aside"><img src="images/icons/pay-visa.png"></aside>
      <aside class="aside"> <img src="images/icons/pay-mastercard.png"> </aside>
      <aside class="aside"><img src="images/icons/pay-visa.png"></aside>
      <aside class="aside"> <img src="images/icons/pay-mastercard.png"> </aside>
    
    </figure>
    
    
        </aside> <!-- col.// -->
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
            </div>
         </main>
        </div>
    </section>
    
    <!-- ========================= SECTION  ========================= -->
    <section class="section-name bg-white padding-y">
    <div class="container">
    
    <div class="row">
    <div class="col-md-6 mt-4 ">
      <a href="{{route('produits.index')}}"class="btn btn-success btn-lg btn-block" type="button" style="background-color: #002687;color: white;">continuer ses achats</a>
    </div>
    <div class="col-md-6 mt-4 ">
    <a href="{{route('paiement.stripe')}}" class="btn btn-success btn-lg btn-block" type="button" style="background-color: #002687;color: white;">Finaliser la commande</a>
    </div>
    </div>
    </div><!-- container // -->
    </section>
    
@else
<section class="section-content bg padding-y border-top" >
    <div class="container" style=" margin-top:100px;">
      <center><p class="h3"style="font-weight:bold;">VOTRE PANIER EST VIDE</p><br>
      <p>ajouter des produits dans votre panier</p>
      <div class="col-md-6 mt-4 ">
        <a href="{{route('produits.index')}}" class="btn btn-success btn-lg btn-block" type="button" style="background-color: #002687;color: white;border:none">passez aux achats !</a></center>
        </div>
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
@endsection
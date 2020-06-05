<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="nav-icon la la-dashboard"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('achats') }}'><i class='nav-icon la la-database'></i> commandes</a></li>
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class=""></i> Catalogue</a>
    <ul class="nav-dropdown-items">
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('produit') }}'><i class="nav-icon las la-cart-plus"></i> Produits</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('category') }}'><i class='nav-icon la la-list'></i> Categories</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('souscategorie') }}'><i class='nav-icon la la-list'></i> Sous Categories</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('marque') }}'><i class='nav-icon la la-database'></i> Marques</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('reduction') }}'><i class='nav-icon la la-database'></i> Bons</a></li>    
</ul>
</li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class=""></i>Localité</a>
    <ul class="nav-dropdown-items">

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('villes') }}'><i class=" nav-icon las la-city"></i></i> Villes</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('communes') }}'><i class='nav-icon la la-database'></i> Communes</a></li>
    </ul>
</li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class=""></i>Utilisateurs</a>
    <ul class="nav-dropdown-items">

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('clients') }}'><i class="nav-icon la la-group"></i> Clients</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('administrators') }}'><i class='nav-icon la la-user'></i> Administrateurs</a></li>

    </ul>
</li>
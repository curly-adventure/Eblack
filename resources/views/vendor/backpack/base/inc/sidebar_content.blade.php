<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="nav-icon la la-dashboard"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-newspaper-o"></i>CATALOGUE</a>
    <ul class="nav-dropdown-items">
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('produit') }}'><i class="nav-icon las la-cart-plus"></i> PRODUITS</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('category') }}'><i class='nav-icon la la-list'></i> CATEGORIES</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('souscategorie') }}'><i class='nav-icon la la-list'></i> SOUS CATEGORIE</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('marque') }}'><i class='nav-icon la la-database'></i> MARQUES</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('reduction') }}'><i class='nav-icon la la-database'></i> BONS</a></li>    
</ul>
</li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('achats') }}'><i class='nav-icon la la-circle'></i>COMMANDES</a></li>


<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-group"></i>UTILISATEURS</a>
    <ul class="nav-dropdown-items">
        
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('clients') }}'><i class="nav-icon la la-group"></i> CLIENTS</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('administrators') }}'><i class='nav-icon la la-user'></i> ADMINISTRATEURS</a></li>
        
    </ul>
</li>
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-cogs"></i>CONFIGURATIONS</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('sliders') }}'><i class='nav-icon la la-database'></i> SLIDER</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('villes') }}'><i class=" nav-icon las la-city"></i></i> VILLES</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('communes') }}'><i class='nav-icon la la-database'></i> COMMUNES</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('tarif_livraisons') }}'><i class='nav-icon la la-question'></i> TARIFS LIVRAISON</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('marge') }}'><i class='nav-icon la la-question'></i> MARGES</a></li>
    </ul>
</li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('promotion') }}'><i class='nav-icon la la-question'></i> PROMOTION</a></li>
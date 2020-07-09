<style>
    #button{
      background:transparent;
      margin-bottom: 20px;
      padding: 5px;
      border:none;
      font-size: 20px;
    
    }
    #button .fas {
      color:#002687;
    }
    #button > a {
      color:#000;
    }
  </style>
<!-- AFFICHAGE ORDI-->
<div class="card col-3 d-none d-lg-block" style="">
    <div class="card-body">
        <button id="button" > 
          <a class="" href="{{route('home')}}"><i class="fas fa-user mr-4" ></i>votre compte </a>
        </button>
        <button id="button">
          <a href="{{route('client.commandes')}}" class=""><i class="fas fa-shopping-basket mr-4"></i>Vos commandes</a>
        </button>
        <button id="button">
          <a href="{{route('wishlist.show')}}"><i class="fas fa-heart mr-4" ></i> favoris</a>
        </button> <hr>
        <button id="button">
          <a href="{{route('client.change_passe')}}" style="font-size: 18px; color:#002687;">modifier votre mot de passe</a>
        </button> <hr>
        <button id="button">
          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-power-off mr-4"></i> deconnexion</a>
        </button>
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
  </form>
  </div>
 
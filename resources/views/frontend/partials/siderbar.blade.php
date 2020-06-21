<nav class="sidebar light">
    <!-- close sidebar menu -->
    <div class="dismiss">
        <i class="fas fa-arrow-left"></i>
    </div>
    
    <div class="logo">
    <h3><a href="{{url('/')}}">Eblack</a></h3>
    </div>

    <div id="tcat"><spam style="text-transform: uppercase;font-size: 15px;font-weight:bold">nos categories</spam> <a href="" style="color:blue">voir plus</a></div>
    <style>#tcat{padding: 5px;font-size: 11px;}#tcat a{margin-left: 60px;font-size: 12px;}</style>
    <ul class="list-unstyled menu-elements">
        @foreach (App\Categories::All() as $i=>$cate)
        @if ($i==4)
            @php break; @endphp
        @endif
        <li class="">
            <a href="#{{$cate->id}}" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" role="button" aria-controls="{{$cate->id}}">
                {{$cate->nom}}
            </a>
            <ul class="collapse list-unstyled" id="{{$cate->id}}">
                <li><a class="" href="{{route('produits.index',['categorie'=>$cate->id])}}">Tous</a></li>
                @foreach ($cate->sousCategories as $sous)
                <li><a class="" href="{{route('produits.index',['categorie'=>$cate->id,'souscategorie'=>$sous->id])}}">{{$sous->nom}}</a></li>
                @endforeach
                
            </ul>
        </li>
        @endforeach
        
        <!--<li class="">
            <a href="#fme" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" role="button" aria-controls="fme">
               Mode Femme
            </a>
            <ul class="collapse list-unstyled" id="fme">
                <li><a class="scroll-link" href="#section-3">Tous</a></li>
                <li><a class="scroll-link" href="#section-4">vêtements</a></li>
                <li><a class="scroll-link" href="#section-4">Chaussures</a></li>
                <li><a class="scroll-link" href="#section-4">Accessoires</a></li>
            </ul>
        </li>
        <li class="">
            <a href="#eft" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" role="button" aria-controls="eft">
                Mode Enfant
            </a>
            <ul class="collapse list-unstyled" id="eft">
                <li><a class="scroll-link" href="#section-3">Tous</a></li>
                <li><a class="scroll-link" href="#section-4">vêtements</a></li>
                <li><a class="scroll-link" href="#section-4">Chaussures</a></li>
                <li><a class="scroll-link" href="#section-4">Accessoires</a></li>
            </ul>
        </li>-->
        
        
    </ul>
    <center>
    <div class="btn-group white ">
        <a class="btn btn-facebook" title="Facebook" target="_blank" href="#"><i class="fab fa-facebook-f  fa-fw"></i></a>
        <a class="btn btn-instagram" title="Instagram" target="_blank" href="#"><i class="fab fa-instagram  fa-fw"></i></a>
        <a class="btn btn-twitter" title="Twitter" target="_blank" href="#"><i class="fab fa-twitter  fa-fw"></i></a>
    </div>
</center>
    <div class="dark-light-buttons">
        <a class="btn btn-primary btn-customized-4 btn-customized-dark" href="#" role="button">Dark</a>
        <a class="btn btn-primary btn-customized-4 btn-customized-light" href="#" role="button">Light</a>
</div>
</nav>
<section class="section-main bg padding-y-sm">
  <div class="">
    <div class="card">
      <div class="card-body" style="margin-top: 40px;padding-left: 0;padding-right: 0;">
        <div class="row row-sm">
          <!-- col.// -->
          <div class="col-md-9">
            @php 
              $sliders=App\Models\Sliders::All();

            @endphp
            <!-- ================= main slide ================= -->
            <div id="carousel1_indicator" class="slider-home-banner carousel slide slider-main" data-ride="carousel" data-interval="3000">
              <ol class="carousel-indicators">
                @for ($i = 0; $i < count($sliders); $i++)
                  <li data-target="#carousel1_indicator" data-slide-to="{{$i}}" class=""></li>
                @endfor
              </ol>
              <div class="carousel-inner">
                @foreach ($sliders as $i=>$slide)
                @php
                    $categorie_id=$slide->categorie_id; $souscategorie_id=$slide->sous_categorie_id;$produit=$slide->produit_id
                @endphp
                @if ($i==0) <div class="carousel-item active item-slide">
                @else <div class="carousel-item item-slide">
                @endif
                @if($produit)<a href="{{route('produits.show',[$produit])}}"><img src="{{asset('storage/'.$slide->image)}}" alt="{{$slide->titre}}" style="width:100%;height:100%;object-fit: cover"> </a>
                   
                @else<a href="{{route('produits.index',['categorie'=>$categorie_id,'souscategorie'=>$souscategorie_id])}}"><img src="{{asset('storage/'.$slide->image)}}" alt="{{$slide->titre}}"  style="width:100%;height:100%;object-fit: cover"> </a>
                @endif
                <div class="carousel-caption">
                    <h5 style="color: white; text-transform : uppercase">{{$slide->titre}}</h5>
                  </div>
                </div>
                @endforeach
              </div>
              <a class="carousel-control-prev" href="#carousel1_indicator" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">
                  <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">précédent</font>
                  </font>
                </span>
              </a>
              <a class="carousel-control-next" href="#carousel1_indicator" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">
                  <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">Prochain</font>
                  </font>
                </span>
              </a>
            </div>
            <!-- ============== main slidesow .end // ============= -->
          </div>
          <style>
            #a-cat {
              border: none;
              border-bottom: 2px solid #00044C;
              border-radius: 20%;
              font-size: 15px;
              background-color: white;
              color: black;
              width: 100px;
            }
          </style>
          @php
          $categories=App\Categories::take(5)->get()
          @endphp
          <div class="col-md d-none d-lg-block flex-grow-1 reveal">
            <aside class="special-home-right">
              <h6 class="bg-blue text-center text-white mb-3 p-3" style="background-color: #00044C;">
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">CATEGORIES POPULAIRE</font>
                </font>
              </h6>

              <div class=" row  reveal-1 mb-0">
                <div class="float-left py-4 ml-4" style="width: 40%;">
                  <img src="{{asset('storage/'.$categories[0]->logo)}}" height="80" style="padding:10px;border:1px solid black;border-radius:50%" class="img-bg">
                </div>
                <div class="py-4 float-right" style="width:30%">
                  <h6 class="card-title">
                    <font style="vertical-align: inherit;">
                      <font style="vertical-align: inherit;">{{$categories[0]->nom}}</font>
                    </font>
                  </h6>
                  <a id="a-cat" href="{{route('produits.index',['categorie'=>$categories[0]->id])}}" class="btn btn-secondary btn-sm" style="">
                    <font style="vertical-align: inherit;">
                      <font style="vertical-align: inherit;">explorer </font>
                    </font>
                  </a>
                </div>
              </div>
              <hr>

              <div class=" row  reveal-1 mb-0">
                <div class="float-left py-4 ml-4" style="width: 40%;">
                  <img src="{{asset('storage/'.$categories[1]->logo)}}" height="80" style="padding:10px;border:1px solid black;border-radius:50%" class="img-bg">
                </div>
                <div class="py-4 float-right" style="width:30%">
                  <h6 class="card-title">
                    <font style="vertical-align: inherit;">
                      <font style="vertical-align: inherit;">{{$categories[1]->nom}}</font>
                    </font>
                  </h6>
                  <a id="a-cat" href="{{route('produits.index',['categorie'=>$categories[1]->id])}}" class="btn btn-secondary btn-sm" style="">
                    <font style="vertical-align: inherit;">
                      <font style="vertical-align: inherit;">explorer </font>
                    </font>
                  </a>
                </div>
              </div>
              <hr>
              <div class=" row  reveal-1 mb-0">
                <div class="float-left py-4 ml-4" style="width: 40%;">
                  <img src="{{asset('storage/'.$categories[2]->logo)}}" height="80" style="padding:10px;border:1px solid black;border-radius:50%" class="img-bg">
                </div>
                <div class="py-4 float-right" style="width:30%">
                  <h6 class="card-title">
                    <font style="vertical-align: inherit;">
                      <font style="vertical-align: inherit;">{{$categories[2]->nom}}</font>
                    </font>
                  </h6>
                  <a id="a-cat" href="{{route('produits.index',['categorie'=>$categories[2]->id])}}" class="btn btn-secondary btn-sm" style="">
                    <font style="vertical-align: inherit;">
                      <font style="vertical-align: inherit;">explorer </font>
                    </font>
                  </a>
                </div>
              </div>

            </aside>
          </div>
        </div> <!-- row.// -->
      </div> <!-- card-body .// -->
    </div> <!-- card.// -->

    <!--<figure class="mt-3 banner p-3 bg-secondary">
    div class="text-lg text-center white">Useful banner can be here</div>
  </figure>
  
  </div>  container .//  -->
</section>
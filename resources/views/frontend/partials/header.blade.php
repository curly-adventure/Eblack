<header class="section-header">
    <div id="scrollUp">
    <a href="#top"><img src="images/to_top.png"/></a>
    </div>
    <nav class="navbar fixed-top  d-lg-none" style="height: auto;background-color: white;box-shadow: 0px 0px 5px 0px #eee;padding-bottom: 0;padding-left: 8px;padding-right: 8px;">
    <a class="btn open-menu" href="#" role="button" style="font-size: 20px;color: #002687;padding: 0;border:none"><i class="fas fa-align-left"></i><!--<i class="fas fa-align-left"></i> --></a>
    <a class="navbar-brand" href="{{url('/')}}" style="color: white;font-weight: bold;"><img class="logo" src="images/eblack.png"></a>
    
    <div class="widget-header dropdown" style="margin-right: -40px;padding: 0;color: #002687">
        <a href="{{url('/connexion')}}" class="ml-1 icontext" >
            <div class="icon-wrap"><i class="icon-sm  fas fa-user-circle"style="color: #002687;font-size:25px"></i></div>
        </a>
    </div>
    <div class="widget-header" >
        <a href="#" class="icontext">
            <div class="icontext mr-0" style="max-width: 50px;color: #002687">
                <span class="icon icon-sm ">
                    <i class="fas fa-cart-plus"></i>
                    <span style="width: 25px;height: 25px; font-size: 12px; text-align: center;line-height: 19px;" class="notify small round badge badge-secondary">
                    3</span>
                </span>
            </div>
        </a>
    </div>
    <div style="width: 100%;margin-top: -10px; ">
        <form action="#" class="py-1 search-header d-lg-none" >
            <div class="input-group " >
                
                <input type="text" class="form-control" style="border: 1px solid #002687;border-right: none; " placeholder="rechercher un produit, une marque ou une categories">
                <div class="input-group-append">
                  <button  onclick="if(!$(search).value) return false;" class="btn btn-primary" style="border: 1px solid #002687;background-color: white;border-left: none;" type="submit">
                    <i style="color:#002687;"class="fa fa-search"></i>
                  </button>
                </div>
            </div>
        </form>
    </div>
  </nav>
  
<section class=" d-none d-lg-block  ">
<!-- class=" navbar-dark bg-dark"-->
<div id="manav" style="background-color: white;z-index: 999;width: 100%; margin-top:0;padding: 10px;position: fixed;">
<div class="row-sm align-items-center" style="z-index: 100;">
<div class="col-lg-4-24 col-sm-3">
    
    <div class="brand-wrap">
        <a class="btn open-menu" href="#" role="button" style="font-size: 20px;color: #002687;border:none"><i class="fas fa-align-left"></i><!--<i class="fa fa-bars"></i>--></a>
        <a href="{{url('/')}}" style="color:white;font-weight:bold;font-size:18px"><img class="logo" src="images/eblack.png"></a>
    </div> 
</div>
<div class="col-lg-11-24 col-sm-8  d-none d-lg-block">
        <form action="#" class="py-1 search-header " >
            <div class="input-group w-100" >
                
                <input type="text" class="form-control"  style="border:2px solid #002687;border-right: transparent;"placeholder="rechercher un produit, une marque ou une categories">
                <div class="input-group-append">
                  <button onclick="if(!$(search).value) return false;" class="btn" type="submit" style="border: 2px solid #002687;border-left: transparent;background-color: white;">
                    <i class="fas fa-search" style="color: #002687;"></i>
                  </button>
                </div>
            </div>
        </form> <!-- search-wrap .end// -->
</div> <!-- col.// -->
<div class="col-lg-8-24 col-sm-12">
    <div class="widgets-wrap float-right row no-gutters py-1">
        <div class="col-auto">
            <div class="widget-header dropdown" >
                <a href="{{url('/connexion')}}" class="ml-1 icontext" >
                    <div class="icon-wrap"><i style="color: #002687;font-size: 25px;" class="icon-sm  fas fa-user-circle" ></i></div>
                
                <div class="textwrap d-none d-lg-block" style="color: #002687;">se connecter  </div></a>
                

            </div>  <!-- widget-header .// -->
        </div> <!-- col.// -->
        <div class="widget-header col-auto">
            <a href="#" class="icontext">
                <div class="icontext mr-0" style="max-width: 50px;color: #002687;">
                    <span class="icon icon-sm ">
                        <i class="fas fa-cart-plus  "></i><!--fa fa-shopping-cart-->
                        <span style="width: 25px;height: 25px; font-size: 12px; text-align: center;line-height: 19px;" class="notify small round badge badge-secondary">
                        3</span>
                    </span>
                </div>
            </a>
        </div>  <!-- col.// -->
        <div class="widget-header col-auto d-none d-lg-block">
            <a href="#" class="icontext">
                <div class="icontext mr-0" style="max-width: 50px;color: #002687;">
                    <span class="icon icon-sm ">
                        <i class="far fa-heart "></i>
                        <span style="width: 25px;height: 25px; font-size: 12px; text-align: center;line-height: 19px;" class="notify small round badge badge-secondary">
                        3</span>
                    </span>
                </div>
            </a>
        </div> <!-- col.// -->
    </div> <!-- widgets-wrap.// row.// -->
</div> <!-- col.// -->
</div> <!-- row.// -->
</div> <!-- container.// -->
</section> <!-- header-main .// -->
</header> <!-- section-header.// -->
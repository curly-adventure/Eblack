@extends('layouts.app')
@section('title','informations personnelles')
@section('content')
<section class="section-content  bg padding-y border-top" >
    <div class="container" style=" margin-top:80px;">
        <div class="row">
        @include('client.menu')
        <div class="col-lg-8 offset-lg-1">
            <div class="card p-3">
              <p style="font-size: 20px;font-weight:bold"><a href="{{route('home')}}" style="color:#002687" class="fas fa-arrow-left"></a> <br class="d-lg-none"> Informations Personnelles</p>
              <div class="card-body">
                <form class="col-lg-9 offset-lg-1" method="POST" action="{{route('client.updateInfo')}}">
                                       @csrf
                        <div class="form-row">
                            <div class="col-lg form-group">
                                <input value="{{$client->nom}}" id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="nom">
                            </div> <!-- form-group end.// -->
                            <div class="col form-group">
                                <input value="{{$client->prenom}}" placeholder="prenom" id="prenom" type="text" class="form-control " name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom" autofocus>
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row end.// -->
                        
                        <div class="form-row mt-4 mb-4" >
                            <div class="col-lg form-group">
                                <input value="{{$client->email}}" id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="email">
                            </div> <!-- form-group end.// -->
                            <div class="col form-group">
                                <input value="{{$client->numero}}" placeholder="numero" id="numero" type="text" class="form-control" name="numero" value="{{ old('numero') }}" autocomplete="numero" autofocus>
                            </div> <!-- form-group end.// -->
                        </div>
                        <div class="form-group text-center" style="">
                            <button  style="max-width: 200px;background-color: #002687;border:none" type="submit" class="btn btn-primary btn-block"> Enregistrer </button>
                        </div> <!--     
                        <div class="form-group"> 
                            <label class="custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input" checked=""> <div class="custom-control-label"> I am agree with <a href="#">terms and contitions</a>  </div> </label>
                        </div> form-group end.// -->           
                    </form>
              </div>
            </div>
        </div>
        </div>
    </div>
</section>
@stop
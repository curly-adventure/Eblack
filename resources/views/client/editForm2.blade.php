@section('extra-script')
<script src="{{ asset('js/jquery-2.0.0.min.js')}}" type="text/javascript"></script>
@endsection
@extends('layouts.app')
@section('title','informations personnelles')
@section('content')
<section class="section-content  bg padding-y border-top" >
    <div class="container" style=" margin-top:80px;">
        <div class="row">
        @include('client.menu')
        <div class="col-lg-8 offset-lg-1">
            <div class="card p-3">
              <p style="font-size: 20px;font-weight:bold"><a href="{{route('home')}}" style="color:#002687" class="fas fa-arrow-left"></a> <br class="d-lg-none"> Votre Adresse</p>
              <div class="card-body">
                <form class="col-lg-9 offset-lg-1" method="POST" action="{{route('client.updateAdr')}}">
                     @csrf
                        <div class="form-row">
                            <div class="col-lg form-group">
                                <label>Ville </label>
                                        <select name='ville' id="inputState" class="form-control ville">
                                            @foreach (App\Ville::All() as $v)
                                            @if ($v->nom==$ville)
                                                <option selected="">{{$v->nom}}</option>
                                            @else
                                            <option> {{$v->nom}}</option>
                                            @endif
                                            @endforeach
                                        </select>    
                            </div> <!-- form-group end.// -->
                            <div class="col form-group">
                                <label>Commune </label>
                                        <select name="commune" id="inputState" class="form-control commune">
                                            @foreach (App\Commune::All() as $c)
                                            @if ($c->nom==$commune)
                                                <option selected="">{{$c->nom}}</option>
                                            @else
                                            <option> {{$c->nom}}</option>
                                            @endif                                            
                                            @endforeach
                                        </select>    
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row end.// -->
                        
                        <div class="col- form-group">
                            <label>detail Addresse </label>
                            <textarea name="desc" class="form-control adresse" id="t1" maxlength="255" placeholder="" required>{{$adresse ?$adresse->description:""}}</textarea>
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
@extends(backpack_view('blank'))

@php
    /*$widgets['before_content'][] = [
        'type'        => 'jumbotron',
        'heading'     => trans('backpack::base.welcome'),
        'content'     => trans('backpack::base.use_sidebar'),
        'button_link' => backpack_url('logout'),
        'button_text' => trans('backpack::base.logout'),
    ];*/
    $produit_count= App\Models\Produit::count();
    $widgets['before_content'][] =[
    'type'        => 'progress',
    'class'       => 'card text-white bg-info mb-2',
    'value'       => $produit_count,
    'description' => 'Client Inscrits.',
    'progress'    => 57, // integer
    'hint'        => '8544 more until next milestone.',
      ]
@endphp

@section('content')
  
  @php
  
        
    
    
  @endphp
@endsection
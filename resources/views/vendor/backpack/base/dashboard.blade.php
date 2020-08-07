@extends(backpack_view('blank'))

@php

    /*$widgets['before_content'][] = [
        'type'        => 'jumbotron',
        'heading'     => trans('backpack::base.welcome'),
        'content'     => trans('backpack::base.use_sidebar'),
        'button_link' => backpack_url('logout'),
        'button_text' => trans('backpack::base.logout'),
	];*/
	$clientenligne=0;
	foreach (App\Models\Clients::all() as $key => $client) {
		if (Cache::has('user-is-online-'.$client->id)){
			$clientenligne=$clientenligne+1;}
	}
	
  	$produitCount = App\Models\Produit::count();
	$userCount = App\Models\Clients::count();
	$achateffectue = App\Models\Achats::where("status_id",3)->count();

 	// notice we use Widget::add() to add widgets to a certain group
	Widget::add()->to('before_content')->type('div')->class('row')->content([
		// notice we use Widget::make() to add widgets as content (not in a group)
		Widget::make()
			->type('progress')
			->class('card border-0 text-white bg-primary h5 p-1')
			->progressClass('progress-bar')
			->value($userCount)
			->description('client inscrits')
			->progress(100*(int)$userCount/200)
			->hint('+ '.(200-$userCount).' jusqu\'au prochain jalon.'),
		Widget::make([
			'type' => 'progress',
			'class'=> 'card border-0 text-black bg-secondary p-3 h4',
			'progressClass' => 'progress-bar',
			'value' => $clientenligne,
			'description' => 'clients connectés',
		]),
		// alternatively, to use widgets as content, we can use the same add() method,
		// but we need to use onlyHere() or remove() at the end
  
		// both Widget::make() and Widget::add() accept an array as a parameter
		// if you prefer defining your widgets as arrays
	    Widget::make([
			'type' => 'progress',
			'class'=> 'card border-0 text-white bg-dark h4',
			'progressClass' => 'progress-bar',
			'value' => $produitCount,
			'description' => 'produits enregistrés',
			'progress' => (int)$produitCount/75*100,
			'hint' => $produitCount>75?'Excellent.':'continuons...',
		]),
		Widget::make([
			'type' => 'progress',
			'class'=> 'card border-0 text-white bg-success p-3 h4',
			'progressClass' => 'progress-bar',
			'value' => $achateffectue,
			'description' => 'achats effectués',
		]),
		
	]);
    
    /*$widgets['after_content'][] = [
	  'type'         => 'alert',
	  'class'        => 'alert alert-warning bg-dark border-0 mb-4',
	  'heading'      => 'Citation du jour',
	  'content'      => 'Le commerce est l\'art d\'abuser du besoin ou du desir que quelqu\'un a de quelque chose.\n(Frères Goncourt)' ,
	  'close_button' => true, // show close button or not
  ];*/
  Widget::add()->to('before_content')->type('div')->class('row')->content([
  Widget::make([ 
    'type'       => 'chart',
    'controller' => \App\Http\Controllers\Admin\Charts\WeeklyUsersChartController::class,
	
    // OPTIONALS

    'class'   => 'card mb-2',
    'wrapper' => ['class'=> 'col-md-6'] ,
    'content' => [
         'header' => 'NOUVELLES ENTREES DU MOIS', 
         'body'   => 'Ici s\'affiche le nombre de clients inscrits et le nombre de produits achetés sur les 30 dernier jour <br>',
    ],
]),
Widget::make([ 
    'type'       => 'chart',
    'controller' => \App\Http\Controllers\Admin\Charts\AchatsChartController::class,
	
    // OPTIONALS

    'class'   => 'card mb-2',
    'wrapper' => ['class'=> 'col-md-6'] ,
    'content' => [
         'header' => 'PRODUITS ACHETES ', 
         'body'   => 'Ici s\'affiche le nombre de produits achetés par mois <br>',
    ],
]),
]);
 widget::add(
	[ 
		        'type' => 'chart',
		        'wrapperClass' => 'col-md-6',
		        // 'class' => 'col-md-6',
		        'controller' => \App\Http\Controllers\Admin\Charts\CountChartController::class,
				'content' => [
				    'header' => 'EFFECTIFS', // optional
				    // 'body' => 'This chart should make it obvious how many new users have signed up in the past 7 days.<br><br>', // optional
		    	]
	    	],
 )
@endphp

@section('content')
	{{-- In case widgets have been added to a 'content' group, show those widgets. --}}
	@include(backpack_view('inc.widgets'), [ 'widgets' => app('widgets')->where('group', 'content')->toArray() ])
@endsection


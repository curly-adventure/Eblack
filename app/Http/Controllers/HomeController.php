<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Alert;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $client=\Auth::user();
        $adresse_client =\App\Adresse::where('client_id', $client->id)->first();
        if($adresse_client!=null){
            $commune = \App\Commune::where('id',$adresse_client->commune_id)->first();
         
            $ville_client = \App\Ville::where('id',$commune->ville_id)->first()->nom;
            $commune_client=$commune->nom;
            }
            else {
                $commune_client=null;
                $ville_client = null;
          }
        //toast('Signed in successfully','success')->autoClose(5000);
        return view('client.index',[
            "adresse" => $adresse_client,
            "client" => $client,
            'commune' => $commune_client,
            'ville' =>$ville_client,
        ]);
    }

    public function favoris()
    {
        $client=\Auth::user();
        return view('client.favoris',["client" => $client,]);
    }
    public function editInfoShow()
    {
        $client=\Auth::user();
        return view('client.editForm1',[
            'client'=>$client,
        ]);
    }

    public function editAdrShow()
    {
        $client=\Auth::user();
        $adresse_client =\App\Adresse::where('client_id', $client->id)->first();
        if($adresse_client!=null){
        $commune = \App\Commune::where('id',$adresse_client->commune_id)->first();
        $ville_client = \App\Ville::where('id',$commune->ville_id)->first()->nom;
        $commune_client=$commune->nom;
        }
        else {
            $commune_client=null;
            $ville_client = null;
        }
        return view('client.editForm2',[
            "adresse" => $adresse_client,
            "client" => $client,
            'commune' => $commune_client,
            'ville' =>$ville_client,
        ]);
    }

    public function updateInfo()
    {
        
        \DB::table('clients')
            ->where('id', \Auth::user()->id)
            ->update(['nom' => request()->input('name'),
                      'prenom' => request()->input('prenom'),
                      'email' => request()->input('email'),
                      'numero' => request()->input('numero'),
                ]);
        return redirect()->route('home')->with('toast_success','mise a jour !');
    }

    public function updateAdr()
    {
        $client=\Auth::user();
        $adresse_client =\App\Adresse::where('client_id', $client->id)->first();
        $commune_id = \App\Commune::where('nom',request()->input('commune'))->first()->id;
        if($adresse_client!=null){
            
        \DB::table('adresses')
            ->where('client_id', $client->id)
            ->update([
                      'commune_id' => $commune_id,
                      'description' => request()->input('desc'),
                ]);
        }
        else{
            \DB::table('adresses') ->insert([
                      'client_id'=> $client->id,
                      'commune_id' => $commune_id,
                      'description' => request()->input('desc'),
                ]);
        }
        return redirect()->route('home')->with('toast_success','mise a jour !');
    }
}

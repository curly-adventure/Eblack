<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use Socialite;
use App\Client;

class SocialController extends Controller
{
public function redirect($provider)
{
    return Socialite::driver($provider)->redirect();
}
 
public function callback($provider)
{
           
    $getInfo = Socialite::driver($provider)->user();
     
    $user = $this->createUser($getInfo,$provider);
 
    auth()->login($user);
 
    return redirect()->to('/client/index');
 
}
function createUser($getInfo,$provider){
 
 $user = Client::where('provider_id', $getInfo->id)->first();
 //dd($getInfo);
 if (!$user) {

     $user = Client::create([
        /*'nom'     => $getInfo->user['family_name'],
        'prenom'   =>$getInfo->user['given_name'],*/
        'nom'     => $getInfo->name,
        'prenom'   =>$getInfo->nickname,
        'motdepasse' => 'eblack225',
        'email'    => $getInfo->email,
        'provider' => $provider,
        'provider_id' => $getInfo->id
    ]);
  }
  return $user;
}

}
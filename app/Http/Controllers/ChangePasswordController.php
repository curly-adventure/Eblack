<?php

namespace App\Http\Controllers;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Hash;
use App\Client;
class ChangePasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('client.changePasse');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        function str_compare($str_1,$str_2){

            if($str_1 == $str_2) return TRUE;
            else return FALSE;
           }
        $request->validate([
            'current_password' => ['required'],
            'new_password' => ['required'],
            'new_confirm_password' => ['required'],
        ]);
            
        $hashedPassword = \Auth::user()->motdepasse;
 
       if (\Hash::check($request->current_password , $hashedPassword )) {
           //dd($request->current_password);
 
         if (!\Hash::check($request->new_password , $hashedPassword)) {
             if (str_compare($request->new_password,$request->new_confirm_password)) {
                 //dd("f");
                $users =Client::find(\Auth::user()->id);
              $users->motdepasse = bcrypt($request->new_password);
              Client::where( 'id' , \Auth::user()->id)->update( array( 'motdepasse' =>  $users->motdepasse));
 
              return redirect(route('home'))->with('toast_success',"mot de passe mise a jour !");
             }
             else{
                //dd($request->new_password,$request->new_confirm_password);
                return back()->with('toast_error',"mot de passe different");
                }
              
            }
 
            else{
                  return back()->with('toast_error',"choisissez un mot de passe different de l'ancien");
                 
                }
 
           }
 
          else{
              
              return back()->with('toast_error',"mot de passe actuel incorrect");
             }

       
        //Client::find(\Auth::user()->id)->update(['motdepasse'=> Hash::make($request->new_password)]);
   
        //dd('Password change successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

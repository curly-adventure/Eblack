<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PanierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(Cart::content());
        if(request()->session()->has('coupon')){
            $total=floatval(Cart::subtotal()) - request()->session()->get('coupon')['remise'];
        }
        else{
            $total=Cart::subtotal();
        }
        return view('panier.index',[
            "total" =>$total,
        ]);
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
    
        $duplicata =Cart::search(function($cartItem, $rowId)use ($request){
            return $cartItem->id==$request->produit_id;
        });

        if ($duplicata->isNotEmpty()) {
            return redirect()->route('panier.index')->with('info','le produit a deja été ajouter');
        }
        
        $produit=Produit::find($request->produit_id);
        if ($request->personnaliser) {
            if(!$request->texte){
                return redirect()->back()->with('toast_info','veillez entrez votre texte');
            }
            DB::table("produit_personnaliser")->insert([
                "produit_id"=>$produit->id,
                "texte" => $request->texte,
                "couleur" => $request->couleur,
            ]);
        }
        Cart::add($produit->id,$produit->nom,$request->qte?$request->qte:1,$produit->prix_vente)
            ->associate('App\Produits');
        return redirect()->route('panier.index')->with('success','le produit a bien été ajouter');
    }

    public function storeCoupon(Request $request)
    {
        $code = $request->get('code');
        $coupon = \App\Coupon::where("code",$code)->first();
        
        if(!$coupon || $coupon->utilise){
            return back()->with('toast_error','ce code coupon est invalide');
        }
        //dd($coupon->discount(Cart::subtotal()));
        $request->session()->put('coupon',[
            'code'=> $coupon->code,
            'remise' => $coupon->discount(Cart::subtotal()),
        ]);
        $coupon->update([
            'utilise'=>1
        ]);
        return back()->with('toast_success','code coupon appliqué');
    }
    
    public function show($id)
    {
        //
    }

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
    public function update()
    {
      Cart::update(request()->rowId, request()->qte);
        return redirect()->route('panier.index')->with('toast_success','panier mis à jour !');

    }
   /* public function update(Request $request, $rowId, $qte)
    {
        $data = $request->json()->all();
        dd($data,$qte);
        $validates = Validator::make($request->all(), [
            'qty' => "numeric|required|between:1,$qte",
        ]);

        if ($validates->fails()) {
            return back()->with(toast("La quantité doit est comprise entre 1 et ".$qte,"error")->autoClose(5000));
            //return response()->json(['error' => 'Cart Quantity Has Not Been Updated']);
        }

        Cart::update($rowId, $data['qty']);
        return back()->with(toast('panier mis à jour !','success')->autoClose(5000));
        //return back()->with(toast('La quantité des produits est passée à ' . Cart::count() . '.','success')->autoClose(5000));
        //return response()->json(['success' => 'Cart Quantity Has Been Updated']);
    }*/


    public function destroy($rowId)
    {
        DB::delete("delete from produit_personnaliser where produit_id=?",[request()->input("produit_id")]);
        Cart::remove($rowId);
        return back()->with('toast_success','article supprimer !');
    }
    public function destroyCoupon()
    {
        $code = request()->session()->get('coupon')['code'];
        //dd($code);
        $coupon = \App\Coupon::where("code",$code)->first();
        request()->session()->forget('coupon');
        $coupon->update([
            'utilise'=>0
        ]);
        return back()->with("toast_success","le coupon a été retiré !");
    }
}

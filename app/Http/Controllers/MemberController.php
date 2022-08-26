<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Checkout;
use App\Stationery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use Carbon\Carbon;

class MemberController extends Controller
{

    //melihat detail
    public function index($id){
        $stationery = Stationery::find($id);
        return view('detail.index',['stationery'=>$stationery]);
    }

    //order
    public function order(Request $request, $id){

        $this->validate($request,[
            'qty'=>'required|gt:0',
        ]);

        $stationery = Stationery::find($id);
        $checkcart = Cart::where('stationery_id',$stationery->id);

        if($request->qty > $stationery->stock){
            return redirect('detail/'.$id);
        }

        if($checkcart->exists()){
            $cart = Cart::where('stationery_id',$stationery->id)->first();
            $cart->qty = $cart->qty + $request->qty;
            $cart->subtotal = $cart->subtotal + ($stationery->price*$request->qty);
            $cart->update();
        }else{
            Cart::create([
                'user_id'=>Auth::user()->id,
                'stationery_id'=>$stationery->id,
                'qty'=>$request->qty,
                'subtotal'=>$request->qty*$stationery->price,
            ]);
        }
        return redirect('homepage');
    }

    //melihat cart
    public function cart(){
        $user = Auth::user();
        $cart = Cart::where('user_id','=',$user->id)->get();
        return view('cart',['cart'=>$cart],['user'=>$user]);
    }

    //view edit cart
    public function edit($id){
        $cart = Cart::find($id);
        return view('editcart.indeks',['cart'=>$cart]);
    }

    public function deletecart(Request $request){
        Cart::find($request->id)->delete();
        return redirect('/homepage');
    }

    public function editcart(Request $request){

        $this->validate($request,[
            'qty'=>'required|gt:0',
        ]);

        Cart::where('id',$request->id)->update([
            'qty'=>$request->qty,
        ]);
        return redirect('/homepage');
    }

    //history

    public function history(){
        $user = Auth::user();
        $checkout = Checkout::where('user_id','=',$user->id)->get();
        $thedate = Checkout::select('date')
            ->where('user_id','=',$user->id)->groupBy('date')->orderBy('date')->get();
 
        return view('history',['checkout'=>$checkout],['thedate'=>$thedate]);
    }

    public function checkout(){
        $date = Carbon::now();
        $user = Auth::user();
        $cart = Cart::where('user_id','=',$user->id)->get();
        
        foreach($cart as $c){
            $checkout = new Checkout();
            $checkout->user_id = Auth::user()->id;
            $checkout->date = $date;
            $checkout->name = $c->stationery->name;
            $checkout->price = $c->stationery->price;
            $checkout->qty = $c->qty;
            $checkout->subtotal = $c->subtotal;
            $checkout->save();
            $c->delete();
        }
        

        return redirect('homepage');
    }
    
}

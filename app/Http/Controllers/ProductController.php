<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Session;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    public function index()
    {
     $data= Product::all();
     return view('product',['products'=>$data]);
    }
    
    
    public function detail($id)
    {
     $data= Product::find($id);
     return view('Detail', ['products'=>$data]);
    }

    
    public function search(Request $request)
    {
      $data= Product::where('name','like','%'.$request->input('query').'%')->get();
      return view('search',['products'=>$data]); 
    }

    
    public function addtocart($id)
    {
     // dd('ssss');
      if(session()->has('user')) {
        $userId=session::get('user')['id'];
        $cart = new Cart;
        $cart->user_id=$userId;
        $cart->product_id=$id;
        $cart->save();
        return redirect('/'); 
      }  
      else
      {
        return redirect('/loginshow');
      }
    }

    public static function cartitems()
    { 
      $userId=session::get('user')['id'];
      // dd($userId);
      // \DB::enableQueryLog();
      $cartCount =  Cart::where('user_id',$userId)->count();
      // print_r(\Db::getQueryLog() );exit;
      // dd($cartCount);
      return $cartCount;
    }

    public function cartList()
    {
      $userId=session::get('user')['id'];
      $product= DB::table('cart')
      ->join('product','cart.product_id','=','product.id')
      ->where('cart.user_id',$userId)
      ->select('product.*','cart.id as cart_id')
      ->get();
      return view('cartlist',['products'=>$product]);
    }

    public function removeCart($id)
    {
      Cart::destroy($id);
      return redirect('cartlist');
    }

  
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
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
  
    
    public function orderNow()
    {
      $userId=session::get('user')['id'];
      $total=$product= DB::table('cart')
      ->join('product','cart.product_id','=','product.id')
      ->where('cart.user_id',$userId)
      ->sum('product.price');
      return view('order_now',['total'=>$total]);
    } 

    
    public function orderPlace(Request $request)
    {
      $userId=session::get('user')['id'];
      $allcart=Cart::where('user_id',$userId)->get(); 
      foreach ($allcart as $cart) {
        $order=new Order();
        $order->product_id=$cart['product_id'];
        $order->user_id=$cart['user_id'];
        $order->status="pending";
        $order->payment_method=$request->payment;
        $order->payment_status="pending";
        $order->address=$request->address;
        $order->save();
        $allcart=Cart::where('user_id',$userId)->delete();
      }
      
      $request->input();
      return redirect('order_list');

    } 

    
    public function orderList()
    {
      $userId=session::get('user')['id'];
      $orders= DB::table('orders')
      ->join('product','orders.product_id','=','product.id')
      ->where('orders.user_id',$userId)
      ->get();
      return view('order_list',['orders'=>$orders]);
    }
}

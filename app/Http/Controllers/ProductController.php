<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\cart;
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
      if(session()->has('user'))
      {
       $cart = new Cart;
       $cart->user_id=session()->get('user')['id'];
       $cart->product_id=$id;
       $cart->save();
       return redirect('/'); 
      }  
      else
      {
       return redirect('/');
      }
    }
}

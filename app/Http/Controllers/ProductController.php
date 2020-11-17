<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
class ProductController extends Controller
{
  public function index()
    {
      $data= product::all();
      return view('product',['products'=>$data]);
    }
    
  public function detail($id)
    {
     $data= product::find($id);
     return view('Detail', ['product'=>$data]);
    }
}

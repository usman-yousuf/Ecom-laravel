@extends('MasterPage.Master')
@section("content")
<div class="custom-product">
    <div class="col-sm-10">
   	  <div class="trending-wrapper">
      <h4>Result for Products</h4>
        @foreach($products as $item)
          <div class="row Searched-items cart-list-divider">
             <div class="col-sm-3">
                <a href="detail/{{$item->id}}">
                <img class="trending-img" src="{{$item->gallery}}">
                </a>
             </div>
             <div class="col-sm-4">
                <div class="">
                  <h3>{{$item->name}}</h3>
                  <h4>{{$item->discription}}</h4>    
                </div> 
             </div>
             <div class="col-sm-3">
                <a href="{{ route('removeCartItem', [$item->cart_id]) }}" class="btn-btn-warning">Remove to Cart</a>
             </div>
          </div>
        @endforeach
      </div>
   </div>
</div>
@endsection
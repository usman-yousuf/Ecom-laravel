@extends('MasterPage.Master')
@section("content")
<div class="custom-product">
    <div class="col-sm-10">
   	  <div class="trending-wrapper">
      <h3>My Order</h3>
        @foreach($orders as $item)
          <div class="row Searched-items cart-list-divider">
             <div class="col-sm-3">
                <a href="detail/{{$item->id}}">
                <img class="trending-img" src="{{$item->gallery}}">
                </a>
             </div>
             <div class="col-sm-4">
                <div class="">
                  <h3>{{$item->name}}</h3>
                  <h4>Delivery Status :{{$item->status}}</h4>
                  <h4>Address :{{$item->address}}</h4>
                  <h4>Payment Status :{{$item->payment_status}}</h4>
                  <h4>Payment_ ethod :{{$item->payment_method}}</h4>    
                </div> 
             </div>
          </div>
        @endforeach
      </div>
   </div>
</div>
@endsection
@extends('MasterPage.Master')
@section("content")
<div class="custom-product">
  <div class="col-sm-4">
    <a href="#">Filter</a>
  </div>
    <div class="col-sm-4">
   	  <div class="trending-wrapper">
      <h4>Result for Products</h4>
        @foreach($products as $item)
          <div class="Searched-items">
            <a href="detail/{{$item['id']}}">
            <img class="trending-img" src="{{$item['gallery']}}">
            <div class="">
              <h3>{{$item['name']}}</h3>
              <h4>{{$item['discription']}}</h4>    
            </div> 
            </a>
          </div>
        @endforeach
      </div>
   </div>
</div>
@endsection



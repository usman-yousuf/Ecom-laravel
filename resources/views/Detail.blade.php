@extends('MasterPage.Master')
@section("content")
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <img class="detail-img" src="{{$product['gallery']}}"> 
        </div>
        <div class="col-sm-6">
            <a href="/">Go Back</a>
            <h3>Name: {{$product['name']}}</h3>
            <h3>Price: {{$product['price']}}</h3>
            <h4>Category: {{$product['category']}}</h4>
            <h4>Discription: {{$product['discription']}}</h4>
            <br><br>
            <button class="btn btn-success">Add to Cart</button>
             <br><br>
             <button class="btn btn-primary">Buy Now</button>
        </div>
    </div>
</div>
@endsection




@extends('MasterPage.Master')
@section("content")
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <img class="detail-img" src="{{ $products['gallery'] }}"> 
        </div>
        <div class="col-sm-6">
            <a href="/">Go Back</a>
            <h3>Name: {{$products['name']}}</h3>
            <h3>Price: {{$products['price']}}</h3>
            <h4>Category: {{$products['category']}}</h4>
            <h4>Discription: {{$products['discription']}}</h4>
            <br><br>
            <a href="../add_to_cart/{{$products['id']}}">add to cart</a>
            <br><br>
            <button class="btn btn-primary">Buy Now</button>
        </div>
    </div>
</div>
@endsection



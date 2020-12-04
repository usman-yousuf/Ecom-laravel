@extends('MasterPage.Master')
@section("content")
<div class="custom-product">
    <div class="col-sm-10">
   	  <table class="table">
        <tbody>
          <tr>
            <td>Item Price</td>
            <td>$ {{$total}}</td>
            </tr>
          <tr>
            <td>Tax</td>
            <td>$ 0</td>
            </tr>
          <tr>
            <td>Delivery</td>
            <td>$ 10</td>
            </tr>
          <tr>
            <td>Total Amount</td>
            <td>$ {{$total+10}}</td>
            </tr>
        </tbody>
      </table>
      <div>
        <form action="{{ route('orderplace')}}" method="POST">
          @csrf
          <div class="form-group">
            <label for="">Address:</label> <br>
            <textarea name="address" class="form-control" placeholder="Enter your address"></textarea>
          </div>
          <div class="form-group">
            <label for="pwd">Payment Method:</label> <br>
            <input type="radio" value="cash" name="payment"><span> Online payment</span> <br>
            <input type="radio" value="cash" name="payment"><span> Cash on Delivery</span> <br><br>
          </div>
          <button type="submit" class="btn btn-success">Oder Now</button>
        </form>
      </div> 
    </div>
</div>
@endsection
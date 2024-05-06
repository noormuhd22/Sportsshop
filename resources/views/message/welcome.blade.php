@extends("layout.theme")
@section("post")
<style>
    img{
        height: 300px;
        width: 300px;
       border-radius:12px;

    }
  .section{
    margin-top: 100px;
    display: flex;
    gap: 20px;
  }
    .box{
      padding: 10px;
      border: 2px solid rgb(246, 43, 43);
      width: 200px;
    }
    h1{
      color: rgb(246, 43, 43);
    }
</style>
<h1>Welcome to My Website</h1>



<div class="section">
<div class="box">
  <h4>Orders</h4>
  <h2>{{ $order }}</h2>
<a href="{{ route('order.index') }}"><p>View Details</p></a>
</div>
<div class="box">
  <h4>Users</h4>
  <h2>{{ $user }}</h2>
  <a href="{{ route('customer.index') }}"><p>View Details</p></a>

</div>
</div>

@endsection
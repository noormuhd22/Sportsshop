@extends('layout.userstyle')
@section('section')

<style>
     img {
    
    border-radius: 12px;
   height:300px;
}
.product-section{
    margin-top:50px;
}
.ss   form {
float:right;
padding: 20px;

border-radius: 5px;

}

.ss label {
font-weight: bold;
}


.ss input[type="text"] {
width: 200px;
padding: 5px;
border: 1px solid #ccc;
border-radius: 3px;
}


.ss button[type="submit"] {
padding: 8px 15px;
background-color: #007bff;
color: #fff;
border: none;
border-radius: 3px;
cursor: pointer;
}


.ss button[type="submit"]:hover {
background-color: #0056b3;
}

#size{
font-size:15px;
}

</style>
@foreach ($products as $product )

<section class="product-section">
  

    <div class="col-lg-4 col-md-6 mb-4">
        <div class="card">

    <img src="{{ asset('uploads/' . $product->image) }}" alt="image">
    <div class="card-body">
        <h2>{{ $product->name }}</h2>
        <p class="card-text"><span class="material-symbols-outlined" id="size">
            currency_rupee
            </span>{{ $product->price }}</p>
             <div class="btn-group">
                 <form action="" method="post">
              <input type="hidden" name="productId" value="{{ $product->id }}">
                <input type="hidden" name="name" value="{{ $product->name }}">
                <input type="hidden" name="price" value="{{ $product->price }}">
                <input type="hidden" name="image" value="{{ $product->image }}">
                <button type="submit" class="btn btn-success">BuyNow</button>'
                </form>
                <form action="" method="post">
                <input type="hidden" name="productId" value="{{ $product->id }}">
                <input type="hidden" name="name" value="{{ $product->name }}">
                <input type="hidden" name="price" value="{{ $product->price }}">
                <input type="hidden" name="image" value="{{ $product->image }}">
                <button type="submit" class="btn btn-primary">Add to Cart</button>
                </form>   
                     </div>
                </div>
                </div>
                </div>

    
            
    
    
    


    @endforeach





@endsection
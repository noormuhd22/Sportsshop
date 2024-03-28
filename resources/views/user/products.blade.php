@extends('layout.userstyle')
@section('section')

<style>
     img {
    
 border-radius: 12px;
   height:300px;
}
section{
    margin-top:50px;
    display: inline-block;
    
  

}
.card{
    width: 400px;
    height: 500px;
    margin-left: 10px;
    
}



</style>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@foreach ($products as $product )




<section>
  

    
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
                <form action="{{ route('cart') }}" method="post">
                    @csrf
                <input type="hidden" name="productId" value="{{ $product->id }}">
                <input type="hidden" name="name" value="{{ $product->name }}">
                <input type="hidden" name="price" value="{{ $product->price }}">
                <input type="hidden" name="image" value="{{ $product->image }}">
                <button type="submit" class="btn btn-primary">Add to Cart</button>
                </form>   
                     </div>
                </div>



                </div>
                
         
</section>
         
    
            
    
    
    


    @endforeach





@endsection
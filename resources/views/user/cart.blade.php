@extends('layout.userstyle')

@section('section')




<style>


  .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }
.container img{
    height: 100px;
    width: 100px;
}
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #ffffff;
            color: grey
        }

        tr:hover {
            background-color: #f5f5f5;
        }
      
        @media screen and (max-width: 600px) {
            table {
                width: 100%;
            }

            th, td {
                padding: 8px;
            }

            .container {
                width: 100%;
                padding: 10px;
            }
        }
</style>


@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="container">
<table>
    <tr>
        <th>Product Name</th>
        <th>Image</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total Price</th> 
        <th>Action</th>
    </tr>
    @php
        $totalPrice = 0; 
    @endphp
    @foreach ($cart as $carts)
        @php
            $subtotal = $carts->price * $carts->quantity;
            $totalPrice += $subtotal; 
        @endphp
        <tr>
            <td>{{ $carts->name }}</td>
            <td><img src="{{ asset('uploads/' . $carts->image) }}" alt="{{ $carts->productname }}" class="product-image"></td>
            <td>${{ $carts->price }}</td>
            <td>
                <div class="input-group">
<div class="input-group-prepend">
<button class="btn btn-outline-secondary minus-btn" type="button" onclick="decrementQuantity({{ $carts->id }})" >-</button>
</div>
<input type="text" class="form-control" id="quantity_{{ $carts->id }}" value="{{ $carts->quantity }}" readonly>
<div class="input-group-append">
<button class="btn btn-outline-secondary plus-btn" type="button" onclick="incrementQuantity({{ $carts->id }})" >+</button>
</div>
</div>
                </td>
            <td class="subtotal" id="subtotal_{{ $carts->id }}">${{ $subtotal }}</td>
            <td>
                <form id="deleteForm_{{ $carts->id }}" action="{{ route('deletecart') }}" method="post">
                    @csrf
                    <input type="hidden" name="productId" value="{{ $carts->id }}">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
            
        </tr>
    @endforeach
    <tr>
        <td colspan="4">Total</td>
        <td id="totalPrice" class="total-price">${{ $totalPrice }}</td>
        <td></td> <!-- Empty cell for alignment -->
    </tr>
</table>
<a href=""><button class="btn btn-primary mt-3">Proceed to Checkout</button></a>
</div>

@endsection

















<script>
     function incrementQuantity(productId) {
        var quantityField = document.getElementById('quantity_' + productId);
        var currentQuantity = parseInt(quantityField.value);
        var newQuantity = currentQuantity + 1;
        quantityField.value = newQuantity;

        
        updateQuantity(productId, newQuantity);
    }

    function decrementQuantity(productId) {
        var quantityField = document.getElementById('quantity_' + productId);
        var currentQuantity = parseInt(quantityField.value);
        if (currentQuantity > 1) {
            var newQuantity = currentQuantity - 1;
            quantityField.value = newQuantity;

       
            updateQuantity(productId, newQuantity);
        }
    }

    function updatePageTotalPrice() {
        var total = 0;
        var subtotals = document.querySelectorAll('.subtotal');
        subtotals.forEach(function(subtotal) {
            total += parseFloat(subtotal.textContent);
        });

        var totalPriceField = document.getElementById('totalPrice');
        totalPriceField.textContent = total.toFixed(2); 
    }

    function updateTotalPrice(productId, newQuantity) {
        var pricePerItem = parseFloat(document.getElementById('price_' + productId).textContent);
        var subtotalField = document.getElementById('subtotal_' + productId);

        var newSubtotal = pricePerItem * newQuantity;
        subtotalField.textContent = newSubtotal.toFixed(2); 
    }
</script>


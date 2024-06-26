@extends('layout.userstyle')

@section('section')
    <style>
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            min-height: 500px;
            border: 2px solid #007bff;
            border-radius: 12px;
        }

        .container img {
            height: 100px;
            width: 100px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
           
        }

        th,
        td {
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
#rs{
    font-size: 15px;
}
.width_form{
    width:30px;
    text-align: center;
    border: 2px solid #007bff;
    margin-left: 5px;
    margin-right: 5px;
}


.minus-btn,.plus-btn{
    border: 2px solid orange;
    border-radius: 10px;
}

footer{
    margin-top: 210px;
}
        @media screen and (max-width: 600px) {
            table {
                width: 100%;
            }

            th,
            td {
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
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>

    @endif



    
    <div class="container">
        @if (count($cart) > 0)
        <h1 class="w3-jumbo"><b>Cart</b></h1>
            <table>
                <tr>
                    <th>Description</th>
                    <th></th>
                    <th>Qty</th>
                    <th>Unit price</th>
                    <th></th>
                    <th></th>
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
                        <td><img src="{{ asset('uploads/' . $carts->image) }}" alt="{{ $carts->productname }}"
                                class="product-image"></td>
                        <td>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary minus-btn" type="button"
                                        onclick="decrementQuantity({{ $carts->productid }})">-</button>
                                </div>
                                <input type="text" class="width_form" id="quantity_{{ $carts->productid }}"
                                    value="{{ $carts->quantity }}"readonly>


                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary plus-btn" type="button"
                                        onclick="incrementQuantity({{ $carts->productid }})">+</button>
                                </div>
                            </div>
                        </td>
                          <td class="price" id="price_{{ $carts->productid }}" >{{ $carts->price }}</td>

                  
                        <td>

                            <form id="deleteForm_{{ $carts->id }}" action="{{ route('deletecart') }}" method="post">
                                @csrf
                                <input type="hidden" name="productId" value="{{ $carts->id }}">
                                <button type="button" class="btn btn-danger delete-btn" data-toggle="modal"
                                    data-target="#confirmationModal">
                                    <span class="material-symbols-outlined">delete</span>
                                </button>
                            </form>


                        </td>


                        <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog"
                            aria-labelledby="confirmationModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmationModalLabel">Confirmation</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this item?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <td class="subtotal" id="subtotal_{{ $carts->productid }}">{{ $subtotal }}</td>


                    </tr>
                @endforeach
                <tr>
                    <td colspan="5">Total</td>
                    <td id="totalPrice" class="total-price">{{ $totalPrice }}</td>
                    <td></td>
                </tr>
            </table>
            <a href="{{ route('checkout') }}"><button class="btn btn-primary mt-3">Proceed to Checkout</button></a>
        @else
            <p>Your cart is empty.</p>
        @endif
    </div>



<script>
    function incrementQuantity(productId) {
    var quantityField = document.getElementById('quantity_' + productId);
    var currentQuantity = parseInt(quantityField.value);
    var newQuantity = currentQuantity + 1;
    quantityField.value = newQuantity;

    // console.log('New Quantity:', newQuantity);
    // console.log('New producid:', productId);

    updateQuantity(productId, newQuantity);
}

function decrementQuantity(productId) {
    var quantityField = document.getElementById('quantity_' + productId);
    var currentQuantity = parseInt(quantityField.value);
    if (currentQuantity > 1) {
        var newQuantity = currentQuantity - 1;
        quantityField.value = newQuantity;

        // console.log('New Quantity:', newQuantity);
        // console.log('New producid:', productId);
        
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
    totalPriceField.textContent = total; // Display price without any symbol
}

function updateTotalPrice(productId, newQuantity) {
    var priceElement = document.getElementById('price_' + productId);
    if (priceElement) {
        var pricePerItem = parseFloat(priceElement.textContent);
        var subtotalField = document.getElementById('subtotal_' + productId);

        var newSubtotal = pricePerItem * newQuantity;
        subtotalField.textContent = newSubtotal; // Display price without any symbol
    } else {
        console.error('Price element not found for productId:', productId);
    }
}


function updateQuantity(productId, newQuantity) {
    var formData = new FormData();
    formData.append('productId', productId);
    formData.append('quantity', newQuantity);

    // console.log('Updating quantity for productId:', productId);
    // console.log('New quantity:', newQuantity);

    fetch("{{ route('update-quantity') }}", {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-Token': '{{ csrf_token() }}'
        }
    })
    .then(response => {
        if (response.ok) {
            // Update UI if necessary
            updateTotalPrice(productId, newQuantity);
            updatePageTotalPrice();
        } else {
            console.error('Failed to update quantity');
        }
    })
    .catch(error => console.error('Error:', error));
}



</script>












  








<script>
    document.addEventListener("DOMContentLoaded", function() {
  const deleteButtons = document.querySelectorAll('.delete-btn');

  deleteButtons.forEach(function(button) {
      button.addEventListener('click', function() {
          console.log('Delete button clicked');
          // Get the form associated with the delete button
          const form = button.closest('form');
          const formId = form.getAttribute('id').replace('deleteForm_', '');
          console.log('Form ID:', formId);

          // Set the form submission event listener
          document.getElementById('confirmDelete').addEventListener('click', function() {
              console.log('Confirm delete clicked');
              form.submit();
          });
      });
  });
});

  </script>

@endsection

@extends('layout.userstyle')

@section('section')

<style>
    .container {
        width: 80%;
        margin: 0 auto;
        padding: 20px;
    }
    .total-price {
        color: green;
    }

    .container img {
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
    #rs{
    font-size: 15px;
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
    <h3>Order Details</h3>
    <table>
        <tr>
            <th></th>
            <th></th>
            <th></th>
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
                <td><img src="{{ asset('uploads/' . $carts->image) }}" alt="{{ $carts->productname }}" class="product-image"></td>
                <td>
                    <div class="input-group">
                        <input type="text" class="form-control" id="quantity_{{ $carts->id }}" value="{{ $carts->quantity }}" readonly>
                    </div>
                </td>
                <td class="subtotal" id="subtotal_{{ $carts->id }}"><span class="material-symbols-outlined" id="rs">
                    currency_rupee
                    </span>{{ $subtotal }}</td>
                <td><span class="material-symbols-outlined" id="rs">
                    currency_rupee
                    </span>{{ $carts->price }}</td>
            </tr>
        @endforeach
        <tr class="total-price">
            <td colspan="4">Total</td>
            <td id="totalPrice"><span class="material-symbols-outlined" id="rs">
                currency_rupee
                </span>{{ $totalPrice }}</td>
            <td></td>
        </tr>
    </table>

    <br>
    <br>
    <br>
    <h4>Delivery Details</h4>

    <div class="form-group">
        <form id="checkoutForm" action="" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="state">State:</label>
                <input type="text" class="form-control" id="state" name="state" required>
            </div>
            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" class="form-control" id="city" name="city" required>
            </div>
            <div class="form-group">
                <label for="pincode">Pincode:</label>
                <input type="tel" class="form-control" id="pincode" name="pincode" required>
            </div>
            <div class="form-group">
                <label for="mobile">Mobile Number:</label>
                <input type="tel" class="form-control" id="mobile" name="mobile" required>
            </div>
        </form>
    </div>
   
  <a href="javascript:void(0)"> <button id="placeOrderBtn" class="btn btn-primary">Place Order</button></a>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
    var $j = jQuery.noConflict();
    $j(document).ready(function () {
        $j("#placeOrderBtn").click(function (event) {
            var name = $j("#name").val();
            var address = $j("#address").val();
            var state = $j("#state").val();
            var city = $j("#city").val();
            var pincode = $j("#pincode").val();
            var mobile = $j("#mobile").val();

            // Regular expressions for mobile number and pincode validation
            var mobileRegex = /^[0-9]{10}$/;
            var pincodeRegex = /^[0-9]{6}$/;

            // Validation checks
            if (name && address && state && city && pincode && mobile && mobile&& pincode) {
                var amount = parseFloat($j("#totalPrice").text().replace('$', '')) * 100;
                var productname = "Your Product Name"; // Update this with your actual product name
                console.log(amount, productname);

                var options = {
                    "key": "rzp_test_C6j4OIc4gfwyCU",
                    "amount": amount,
                    "name": "Sports Shop",
                    "description": productname,
                    "image": "/logo.ico",

                    "handler": function (response) {
                        var paymentid = response.razorpay_payment_id;
                        $j.ajax({
                            url: "{{ route('payment.process') }}",
                            type: "POST",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {
                                payment_id: paymentid,
                                totalprice: amount / 100,
                                name: name,
                                address: address,
                                state: state,
                                city: city,
                                pincode: pincode,
                                mobile: mobile,
                            },
                            success: function (data) {
                                // Redirect to paymentsuccess blade file upon successful payment processing
                                window.location.href = "{{ route('payment.success') }}";
                            },
                            error: function (xhr, status, error) {
                                // Handle error if necessary
                                console.error(xhr.responseText);
                            }
                        });
                    },
                    "theme": {
                        "color": "#3399cc"
                    }
                };

                var rzp1 = new Razorpay(options);
                rzp1.open();
            } else {
                alert("Please fill out all the fields correctly before proceeding to payment.");
            }

            event.preventDefault();
        });
    });
</script>


@endsection

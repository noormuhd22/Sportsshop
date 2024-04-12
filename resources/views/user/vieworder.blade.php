@extends('layout.userstyle')

@section('section')





<style>
    h3 {
        text-align: center;
        padding: 20px;
        font-size: 30px;
        color: #007bff;
    }
    h4 {
        color: #007bff;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    table th, table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    table th {
        background-color: #f2f2f2;
    }
    img{
        height:80px;
        width:100px;
        border-radius:3px;
    }
    .totalprice{
        color:green;
    }
</style>
<body>

<div class="container mt-5">
    <h4>View Order Details</h4>

 
        <h3>Customer Details (Order No: {{ $order->id }})</h3>
        <table>
            <tr>
                <th>Customer Information</th>
            </tr>
            <tr>
                <td>
                    <p>Name: {{ $order->name }}</p>
                    <p>Phone Number:{{ $order->mobile }}</p>
                    <p>Address: {{ $order->address }}</p>
                    <p>State: {{ $order->state }}</p>
                    <p>City:{{ $order->city }}</p>
                    <p>Pincode: {{ $order->pincode }}</p>
                </td>
            </tr>
        </table>

        <h3>Order Details</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Img</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orderitems as $orderitem)
                    <tr>
                        <td>{{ $orderitem->productname }}</td>
                        <td><img src="{{ asset('uploads/' . $orderitem->image) }}" alt="img"></td>
                        <td>{{ $orderitem->quantity }}</td>
                        <td>{{ $orderitem->price }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <table>
            <tr>
                <td>
                    <p class="totalprice">Total Price: {{ $order->totalprice }}</p>
                    <p>Payment ID: {{ $order->paymentid }}</p>
                    <p>Order Date: {{ $order->added_date }}</p>
                    <p>Order Status : @if($order->status == 0)
                        Processing @elseif ($order->status == 1)
                        Confirmed @elseif ($order->status == 2)
                        Shipped @else
                        Delivered  @endif</p>
                </td>
            </tr>
        </table>

</div>

@endsection








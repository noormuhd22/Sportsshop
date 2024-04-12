@extends('layout.theme')
@section('post')

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
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0,0,0,0.4);
    }
    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 50%;
    }
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }
    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
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
                    Processing @elseif ($order->status ==1)
                    Confirmed @elseif ($order->status ==2)
                    Shipped @else
                    Delivered  @endif</p>
                </td>
            </tr>
            <div id="myModal" class="modal">
                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <form method="POST" action="{{ route('update.status', $order->id) }}">
                        @csrf
                       
                        <div class="form-group">
                            <label for="status">Change Status:</label>
                            <select class="form-control" id="status" name="status">
                                <option value="0">Processing</option>
                                <option value="1">Confirmed</option>
                                <option value="2">Shipped</option>
                                <option value="3">Delivered</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Take Action</button>
                    </form>
                </div>
            </div>
        </table>
        <br>
        <button id="myBtn" class="btn btn-primary">Take Action</button>
</div>





<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

@endsection

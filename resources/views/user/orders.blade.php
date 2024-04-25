@extends('layout.userstyle')

@section('section')




<style>

.container{
    margin-top: 50px;
    height: 700px; 
    width: 1300px;
    overflow-x: scroll;
    border: 2px solid rgb(0, 187, 255);
    border-radius: 12px;
}
/* Custom CSS for styling the table */
.table {
    width: 100%;
    border-collapse: collapse;
    
   
  
}
.table th {
    color: grey;
}

    .status{
        color: green;
    }
</style>




<div class="container">
<table class="table">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">User ID</th>
            <th scope="col">Address</th>
            <th scope="col">City</th>
            <th scope="col">State</th>
            <th scope="col">Pincode</th>
            <th scope="col">Mobile</th>
            <th scope="col">Total Price</th>
            <th scope="col">Payment ID</th>
            <th scope="col">Order ID</th>
            <th scope="col">Date</th>
            <th scope="col">Status</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($order as $orders)
        <tr>
            <td>{{ $orders->name }}</td>
            <td>{{ $orders->userid}}</td>
            <td>{{ $orders->address }}</td>
            <td>{{ $orders->city}}</td>
            <td>{{ $orders->state }}</td>
            <td>{{ $orders->pincode }}</td>
            <td>{{ $orders->mobile }}</td>
            <td>{{ $orders->totalprice }}</td>
            <td>{{ $orders->paymentid }}</td>
            <td>{{ $orders->id }}</td>
            <td>{{ $orders->added_date }}</td>
            <td class="status">
                @if ($orders->status == 0)
                    processing
                @elseif ($orders->status == 1)
                    confirmed
                @elseif($orders->status ==2)
                   Shipped
                @else
                Delivered
                @endif
            </td>
            <td>
                <a href="{{ route('user.view', ['id' => $orders->id]) }}">
                    <button class='btn btn-primary'>View</button>
                </a>
            </td>
            
        </tr>
        @endforeach
    </tbody>
</table>


</div>










@endsection
@extends("layout.theme")
@section("post")

<style>
    .table-responsive{
             border: 2px solid rgb(246, 43, 43);
        border-radius: 12px;
        overflow-x: auto;
     
    }
</style>



<div class="table-responsive">

    
<table class="table">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Mobile</th>
         
        </tr>
    </thead>
    <tbody>
        @foreach($customers as $customer)
        <tr>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->mobile }}</td>
           
           
            
         
        </tr>
        @endforeach
    </tbody>
</table>
</div>

@endsection

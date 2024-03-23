@extends("layout.theme")
@section("post")

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<table class="table">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Address</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($customers as $customer)
        <tr>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->phone }}</td>
            <td>{{ $customer->address }}</td>
            <td>
                <a href="{{ route('customer.edit', ['id' => $customer->id]) }}">
                    <button class='btn btn-primary'>Edit</button>
                </a>
            </td>
            
            <td><a href="/customers/{{ $customer->id}}/delete"><button class='btn btn-danger'>Delete</button></a></td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Button to redirect to the add customer form -->
<a href="{{ route('customer.create') }}"><button class='btn btn-success'>Add Customer</button></a>

@endsection

@extends("layout.theme")
@section('post')



@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<table class="table">
    <thead>
        <tr>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Category</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($product as $products)
        <tr>
          <td> <img src="{{ asset('uploads/' . $products->image) }}" alt="Product Image" height="100px" width="100px"></td>
            <td>{{ $products->name }}</td>
            <td>{{ $products->price }}</td>
            <td>{{ $products->categoryname }}</td>
            <td>
                <a href="{{Route('product.edit',['id'=>$products->id]) }}">
                    <button class='btn btn-primary'>Edit</button>
                </a>
            </td>
            
            <td><a href="{{ route('product.delete', ['id' => $products->id]) }}"><button class='btn btn-danger'>Delete</button></a></td>

        @endforeach
    </tbody>
</table>

<!-- Button to redirect to the add customer form -->
<a href="/product/form"><button class='btn btn-success'>Add Product</button></a>

@endsection
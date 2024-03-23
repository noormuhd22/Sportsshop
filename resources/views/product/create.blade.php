@extends('layout.theme')

@section('post')


<form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="product_name" class="form-label">Product Name</label>
        <input type="text" class="form-control" id="product_name" name="name" value="{{ old('name','') }}">
        <div class="text-danger">
            @error('name')
                {{ $message }}
            @enderror
        </div>
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" class="form-control" id="price" name="price" step="0.01" required value="{{ old('price','') }}">
        
        <div class="text-danger">@error('price')
            {{ $message }}
        @enderror</div>
    </div>

    <div class="mb-3">
        <label for="photo" class="form-label">Photo</label>
        <input type="file" class="form-control" id="photo" name="photo" accept="image/*" required>
       <div class="text-danger">@error('photo')
           {{ $message }}
       @enderror</div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>



@endsection
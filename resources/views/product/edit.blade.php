@extends('layout.theme')
@section('post')

<form method="POST" id="edit_product" action="{{ route('product.update', ['id'=>$product->id]) }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $product->id }}">
    <div class="mb-3">
        <label for="product_name" class="form-label">Product Name</label>
        <input type="text" class="form-control" id="product_name" name="name" value="{{ old('name',$product->name) }}" required>
       <div class="text-danger">@error('name')
           {{ $message }}
       @enderror</div>
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="text" class="form-control" id="price" name="price" step="0.01" value="{{ old('price',$product->price) }}" required>
    <div class="text-danger">
        @error('price')
            {{ $message }}
        @enderror
    </div>
    </div>
    
    <div class="mb-3">
        <label for="category" class="form-label">Category</label>
        <select class="form-select" id="category" name="categoryname" required>
            <option value="">Select Category</option>
            @foreach($categories as $category)
                <option value="{{ $category->name }}" >{{ $category->name }}</option>
            @endforeach
        </select>
        <div class="text-danger">
            @error('categoryname')
                {{ $message }}
            @enderror
        </div>
    </div>

    <div class="mb-3">
        <img src="{{ asset('uploads/' . $product->image) }}" alt="img" height="70px" width="70px">
        <label for="photo" class="form-label">Photo</label>
        <input type="file" class="form-control" id="photo" name="photo" accept="image/*" >
        <div class="text-danger">
            @error('photo')
                {{ $message }}
            @enderror
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection

@extends('layout.theme')

@section('post')


<form method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="category_name" class="form-label">category Name</label>
        <input type="text" class="form-control" id="category_name" name="name" value="{{ old('name','') }}">
        <div class="text-danger">
            @error('name')
                {{ $message }}
            @enderror
        </div>
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
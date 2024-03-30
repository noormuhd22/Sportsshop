@extends('layout.theme')


@section('post')



<form method="POST" action="{{route('category.update', ['id' => $categories->id]) }}" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="category_name" class="form-label">category Name</label>
        <input type="text" class="form-control" id="category_name" name="name" value="{{ $categories->name }}">
        <div class="text-danger">
            @error('name')
                {{ $message }}
            @enderror
        </div>
    </div>


    <div class="mb-3">

        <img src="{{ asset('uploads/' . $categories->image) }}" alt="img" height="100px" width="100px">

        <label for="photo" class="form-label">Photo</label>
        <input type="file" class="form-control" id="photo" name="photo" accept="image/*" >
       <div class="text-danger">@error('photo')
           {{ $message }}
       @enderror</div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
@extends('layout.theme')
@section('post')

<style>
     .table-responsive{
        border: 2px solid rgb(246, 43, 43);
        border-radius: 12px;
        overflow-x: auto;
        padding: 20px;
    }
</style>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<!-- Button to redirect to the add customer form -->
<a href="/category/form"><button class='btn btn-success'>Add Category</button></a>
<br>
<br>
<br>
<div class="table-responsive">
<table class="table">
    <thead>
        <tr>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
        
            
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
          <td> <img src="{{ asset('uploads/' . $category->image) }}" alt="category Image" height="100px" width="100px"></td>
            <td>{{ $category->name }}</td>
          
            <td>
                <a href="{{Route('category.edit',['id'=>$category->id]) }}">
                    <button class='btn btn-primary'>Edit</button>
                </a>
            </td>
            
            <td><a href="{{ route('category.delete', ['id' => $category->id]) }}"><button class='btn btn-danger'>Delete</button></a></td>

        @endforeach
    </tbody>
</table>
</div>







@endsection
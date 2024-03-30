@extends('layout.userstyle')

@section('section')
<style>
    .card{
        margin-top: 100px;
        height: 400px;
    }
    h5{
        text-align: center;
        color: green;
    }
</style>
<div class="container m-auto">
    <div class="row">
        @foreach ($categories as $category)
        
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
                <h5 class="card-title">{{ $category->name }}</h5>
                <img src="{{ asset('uploads/' . $category->image) }}" class="card-img-top" alt="Category Image">
            </div>
         
        </div>
        @endforeach
    </div>
</div>


@endsection
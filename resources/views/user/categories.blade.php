@extends('layout.userstyle')

@section('section')
<style>
    .category-section {
        margin-top: 50px;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        height: 900px; 
        gap: 30px; 
    }

    .category-card {
        width: 300px;
        height: 400px; 
        border-radius: 12px;
        overflow: hidden; 
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
    }

    .category-card img {
        width: 100%; 
        height: 60%; 
        object-fit: cover; 
        border-radius: 12px 12px 0 0; 
    }

    .category-card .card-body {
        padding: 20px;
    }

    .category-card h2 {
        text-align: center;
        color: green;
        margin-top: 10px; 
        font-size: 1.5rem; 
    }
</style>

<div class="category-section">
    @foreach ($categories as $category)
    <div class="category-card">
        <a href="{{ route('category.show', $category->id) }}">
        <img src="{{ asset('uploads/' . $category->image) }}" alt="Category Image">
    </a>
        <div class="card-body">
            <h2>{{ $category->name }}</h2>
        </div>
    </div>
    @endforeach
</div>

@endsection

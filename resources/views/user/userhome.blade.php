@extends('layout.userstyle')

@section('section')
<style>
    .carousel {
        margin-top: 50px; 
    }

    .carousel-inner .carousel-item img {
        height: 400px;
        width: 100%; 
        object-fit: cover; 
        border-radius: 12px;
    }

    .carousel-control-prev, .carousel-control-next {
        width: 5%; 
    }

    .carousel-control-prev-icon, .carousel-control-next-icon {
        background-color: rgba(0, 0, 0, 0.5);
        border-radius: 50%; 
        padding: 15px; 
    }

    .carousel-control-prev-icon:before, .carousel-control-next-icon:before {
        color: white; 
    }
</style>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        @foreach ($products as $index => $product)
        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></li>
        @endforeach
    </ol>
    <div class="carousel-inner">
        @foreach ($products as $index => $product)
        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
            <img class="d-block w-100" src="{{ asset('uploads/' . $product->image) }}" alt="Slide {{ $index + 1 }}">
        </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
@endsection

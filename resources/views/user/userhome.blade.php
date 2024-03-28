@extends('layout.userstyle')

@section('section')
<style>
    .d-block{
      
        margin-left: auto;
        margin-right: auto;
        height: 500px;
        width:88%;
    }
    .carousel-inner{
      margin-top: 100px;
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
        <img class="d-block " src="{{ asset('uploads/' . $product->image) }}" alt="Slide {{ $index + 1 }}">
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

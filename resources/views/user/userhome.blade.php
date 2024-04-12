@extends('layout.userstyle')

@section('section')
<style>
    .carousel {
        margin-top: 50px; 
    }

    .carousel-inner .carousel-item img {
        height: 500px;
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
    .content{
        margin-top: 30px;

    }
    .content h2{
        font-size: 50px;
        font-weight: 1000;
        margin-left: 5%;
        color: rgb(44, 172, 222);
    }
    .content p{
        margin-left: 5%;
    }
    ul{
        margin-left: 5%;
    }
    strong{
        color: rgb(44, 172, 222);
    }
h5{
    margin-top: 50px;
    text-align: center;
    color:  rgb(44, 172, 222);
}
</style>
<h5>Welcome to SportShop - Your Ultimate Destination for Sports Gear! </h5>
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

<div class="content">
    <div><h2>What We do ?</h2>
    <p>At Sports Shop , we're passionate about sports and dedicated to providing the best products and services to our customers. 
        Whether you're aprofessional athlete or a weekend warrior, we have everything you need to enhance your performance and enjoy your
     favorite sports to the fullest.</p>
     <ul>
        <li><strong>Quality Products:</strong> We offer a wide range of high-quality sports equipment, apparel, and accessories from leading brands in the industry.</li>
        <li><strong>Expert Advice:</strong> Our knowledgeable staff is here to assist you in finding the perfect gear tailored to your needs.</li>
        <li><strong>Community Engagement:</strong> We actively support local sports teams, events, and initiatives to promote active lifestyles and foster a sense of community.</li>
    </ul>


    <h2>Our Services:</h2>
    <ul>
        <li><strong>Equipment Sourcing:</strong> Can't find what you're looking for? Let us know, and we'll do our best to source it for you.</li>
        <li><strong>Customization:</strong> Personalize your gear with our customization services.</li>
        <li><strong>Repair and Maintenance:</strong> Extend the life of your sports equipment with our repair and maintenance services.</li>
    </ul>
    
    </div>
 
</div>

@endsection

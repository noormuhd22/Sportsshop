@extends('layout.userstyle')
@section('section')

    <title>Product Page</title>
    <style>
        /* Style for the card */
        .product-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 250px; /* Adjust width as needed */
            margin: 20px;
            display: inline-block;
            transition: transform 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .product-image {
            width: 100%;
            height: 150px; /* Adjust height as needed */
            object-fit: cover;
        }

        .product-details {
            padding: 15px;
        }

        .product-title {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .product-description {
            font-size: 14px;
            color: #666;
            margin-bottom: 10px;
        }

        .product-price {
            font-size: 20px;
            font-weight: bold;
            color: #333;
        }

        .buy-button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .cart-button{
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .cart-button[disabled] {
            background-color: #6c757d;
            cursor: not-allowed;
        }
        .cart-button:hover{
            background-color: #2ebf4f;
        }
        .buy-button:hover {
            background-color: #0056b3;
        }
        .success-message{
            color: green;
        }
    </style>
</head>
<body>
    @if(session('success'))
    <div class="success-message">
        {{ session('success') }}
    </div>
    @endif
    @foreach ($products as $product )
    <div class="product-card">
        <img src="{{ asset('uploads/' . $product->image) }}" alt="image" class="product-image">
        <div class="product-details">
            <h2 class="product-title">{{ $product->name }}</h2>
            <p class="product-description">Product description goes here. Keep it concise and informative.</p>
            <span class="material-symbols-outlined" id="size">currency_rupee</span><p class="product-price">{{ $product->price }}</p>
            <form action="" method="post">
                <input type="hidden" name="productId" value="{{ $product->id }}">
                <input type="hidden" name="name" value="{{ $product->name }}">
                <input type="hidden" name="price" value="{{ $product->price }}">
                <input type="hidden" name="image" value="{{ $product->image }}">
                <button type="submit" class="buy-button">Buy Now</button>
            </form>
            <form action="{{ route('cart') }}" method="post">
                @csrf
                <input type="hidden" name="productId" value="{{ $product->id }}">
                @if ($user)
                <input type="hidden" name="userid" value="{{ $user }}">
                @endif
                <button type="submit" class="cart-button" onclick="this.innerHTML='Adding...';this.form.submit();">Add to Cart</button>
                
            </form>   
        </div>
    </div>
    @endforeach
    @endsection
</body>
</html>

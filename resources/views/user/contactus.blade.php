@extends('layout.userstyle')
@section('section')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<style>
    .contact-us-container {
        margin-top: 50px;
        text-align: center;
    }

    .contact-us-image {
        max-width: 100%; 
        height: auto; 
        border-radius: 12px; 
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
    }

    .contact-us-form {
        max-width: 600px;
        margin: 0 auto;
    }

   

    .contact-us-form input,
    .contact-us-form textarea {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    .contact-us-form button {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .contact-us-form button:hover {
        background-color: #0056b3;
    }

    .error-message {
        color: red;
    }
</style>

<div class="container contact-us-container">
    <div class="row">
        <div class="col-md-6">
            <img src="contactus.jpg" class="contact-us-image" alt="Contact Us Image">
        </div>
        <div class="col-md-6">
            <h2>Contact Us</h2>
            <form action="{{ route('submitform') }}" method="post" class="contact-us-form">
                @csrf
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{ old('email') }}" required>
                    <div class="error-message">
                        @error('email')
                            {{ $message }}
                        @enderror    
                    </div> 
                </div>
                <div class="form-group">
                    <label for="phone">Phone number</label>
                    <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="Enter phone number" required>    
                    <div class="error-message">
                        @error('mobile')
                            {{ $message }}
                        @enderror    
                    </div> 
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="5" placeholder="Enter your message" required></textarea>
                    <div class="error-message">
                        @error('message')
                            {{ $message }}
                        @enderror    
                    </div> 
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection

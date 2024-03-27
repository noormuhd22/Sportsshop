@extends('layout.userstyle')
@section('section')


@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="container mt-6">

<style>

    .img-fluid{
        height:400px;
        width:500px;
        margin-left:300px;
    }
    footer{
        margin-top:50px;
    }
</style>

  

    <div class="container mt-5">
        <img src="contactus.jpg" class="img-fluid" alt="Contact Us Image">
    </div>

    
    <div class="container mt-5">
        <h2>Contact Us</h2>
       
           
        <form action="{{ route('submitform')  }}" method="post">
           @csrf
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{ old('email') }}" required>
            <div  class="text-danger">
            @error('email')
                {{ $message }}
            @enderror    
            </div> 
            
            </div>
            <div class="form-group">
                <label for="phone">Phone number</label>
                <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="Enter phone number" required>    
                <div  class="text-danger">
                    @error('mobile')
                        {{ $message }}
                    @enderror    
                    </div> 
                    
            </div>
            
            <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" name="message" rows="5" placeholder="Enter your message" required></textarea>
                <div  class="text-danger">
                    @error('message')
                        {{ $message }}
                    @enderror    
                    </div> 
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


</div>


@endsection
@extends('layout.userstyle')
@section('section')


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
       
           
        <form action="" method="post">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone number</label>
                <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter phone number" required>    
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" name="message" rows="5" placeholder="Enter your message" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


</div>


@endsection
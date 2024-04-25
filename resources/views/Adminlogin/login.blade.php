<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <style>
    body {
      background-color: #f8f9fa; /* Light gray background */
    }
    .card {
      margin-top: 200px;
      background-color:  #007bff; /* White background */
      color: #ffffff; /* Black text */
      border-radius: 10px; /* Rounded corners */
    }
   
    .card-body {
      padding: 20px; /* Add padding */
    }
 

    p a {
      color: #ffffff; /* Blue link color */
    }
    a:hover {
      text-decoration: none; /* Remove underline on hover */
    }
    a button{
      background-color:  #007bff;
      color: white;
      padding:  5px;
    height: 40px;
      margin: 10px;
      width: 70px;
      border-radius: 5px;
      border: none;
     }
     .btn-primary{
      border: 1px solid white;
     }
     .btn-primary:hover{
      border: 1px solid rgb(255, 255, 255);
     }
  </style>
</head>
<body>
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<a href="/"><button>Back</button></a>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h3>Admin Login</h3>
          <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autocomplete="email">
              @error('email')
                <div class="text-danger">{{ $message }}</div>
              @enderror 
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" required>
              @error('password')
                <div class="text-danger">{{ $message }}</div>
              @enderror 
            </div>
            <button type="submit" class="btn btn-primary btn-login">Login</button>
          </form>
          <div class="mt-3">
            <p>Create an account ? <a href="{{ route('signuppage') }}">Signup</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS (optional) -->
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

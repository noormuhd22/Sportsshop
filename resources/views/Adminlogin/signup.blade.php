<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup Form</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
  body {
    background-color: #f8f9fa; /* Light gray background */
  }
  .card {
    margin-top: 200px;
    background-color: #007bff; /* White background */
    color: #ffffff; /* Black text */
    border-radius: 10px; /* Rounded corners */
  }
  .card-header {
    background-color: #007bff; /* Blue header background */
    color: #fff; /* White text */
    text-align: center;
    border-top-left-radius: 10px; /* Rounded corners for top */
    border-top-right-radius: 10px;
  }
  .card-body {
    padding: 20px; /* Add padding */
  }
  

  .btn-signup:hover {
    background-color: #007bff; /* Darker blue on hover */
  }
  a {
    color:#ffffff; /* Blue link color */
  }
  a:hover {
    text-decoration: none; /* Remove underline on hover */
  }
</style>
<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
    
       
     
          <div class="card-body">
            <h3>Signup</h3>
            <form action="{{ route('signup') }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                  <div class="text-danger">{{ $message }}</div>
                @enderror 
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
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
              <div class="form-group">
                <label for="mobile">Mobile</label>
                <input type="text" class="form-control" id="mobile" name="mobile" value="{{ old('mobile') }}" required>
                @error('mobile')
                  <div class="text-danger">{{ $message }}</div>
                @enderror 
              </div>
              <button type="submit" class="btn btn-primary btn-signup">Signup</button>
            </form>
            <div class="mt-3">
              <p>Already have an account? <a href="/loginpage">Login</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS (optional) -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

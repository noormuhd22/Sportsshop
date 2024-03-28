


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
  .card{
      margin-top: 100px;
      background-color: #007bff;
      color: rgb(255, 255, 255);
      border: 2px solid rgb(0, 0, 0);
   
  }
  a{
      color: rgb(49, 158, 240);
  }
  .card-header{
  
    text-align: center;
     }
     
</style>
<body>
  
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
    
        <div class="card">
        
          <div class="card-header">
          Login Page
          </div>
          <div class="card-body">
            <form action="{{ route('userlogin') }}" method="POST">
                @csrf
             
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                <div class="text-danger">

                  @error('email')
                    {{ $message }}
                  @enderror 
                </div>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" required>
                <div class="text-danger">

                  @error('password')
                    {{ $message }}
                  @enderror 
                </div>
             
              </div>
              <button type="submit" class="btn btn-primary">login</button>
            </form>
            <div class="mt-3">
              <p>Create an account <a href="{{ route('usersignuppage') }}">Signup</a></p>
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



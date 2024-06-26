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
 .container{
        width: 500px;
        margin-top: 200px;
        background-color: #ffffff;
        color:#007bff;
    padding: 20px;
    border-radius: 12px;
    border: 2px solid #007bff;
    box-shadow: 0 0 10px rgba(0, 0, 10, 0.67);
    }
    p a {
      color: #007bff;
    }
    .btn-primary{
      border: 1px solid white;
     }
     .btn-primary:hover{
      border: 1px solid rgb(255, 255, 255);
     }
</style>
<body>
  <div class="container ">
   
    <h2 class="w3-jumbo"><b>Sign up</b></h2>
          
         
            <form action="{{ route('usersignup') }}" method="POST">
                @csrf
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                <div class="text-danger">

                    @error('name')
                      {{ $message }}
                    @enderror 
                  </div>
            </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
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
              <div class="form-group">
                <label for="mobile">Mobile</label>
                <input type="text" class="form-control" id="mobile" name="mobile" value="{{ old('mobile') }}" required>
                <div class="text-danger">

                  @error('mobile')
                    {{ $message }}
                  @enderror 
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Signup</button>
            </form>
            <div class="mt-3">
              <p>Already have an account? <a href="/userloginpage">Login</a></p>
            </div>
          </div>
        </div>
     

  <!-- Bootstrap JS (optional) -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

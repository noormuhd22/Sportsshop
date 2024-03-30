<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <title>Login</title>
    <style>
        
        .container {
            text-align: center;
            margin-top:350px ;
            font-family: 'Poppins', sans-serif;
        }
        .logo {
            max-width: 200px;
            margin-bottom: 20px;
            border-radius: 12px;
        }
        .btn-login {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 20px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .btn-login:hover {
            background-color: #0056b3;
        }
        h2{
         text-align: center;
       
        }
    </style>
</head>
<body>
  
    <a href="{{ route('loginpage') }}"><h2>ADMIN</h2></a>
    <div class="container">  
        <img src="logo.jpg" alt="Logo" class="logo">
            <br>
            <a href="{{ route('userloginpage') }}"><button type="submit" class=" btn-login">Login</button></a>
        
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sportsshop </title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <style>
        body{
            font-family: "Poppins", sans-serif;
  font-weight: 400;
  
        }
        .navbar {
            background-color: #ffffff;
            height: 100px;
            width: 100%;
          
        }
        .navbar-brand {
            color: #ffffff;
            font-weight: bold;
        }
       .nav-link {
      margin-top: 30px;
        font-size: 23px;
      font-weight: 600;
      display: block;
      color: #007bff;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      transition: transform 0.3s ease;

        }
        .nav-link img{
        border-radius:12px;
        height:80px;
        width:80px;
    
       }


        .nav-link:hover{
            color:rgb(246, 43, 43);
            transform: translatey(-5px);
            
        }
        #right{
          float: right;
          margin-left: 800px;
        }
      
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
 
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a href="/welcome" class="nav-link"  > <img src="{{ asset('logo.ico') }}" alt="img"></a>
              </li>
              <li class="nav-item">
                <a class="nav-link " aria-current="page" href="/welcome">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/customers"> Customer</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/product">Product</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/category">Category</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/orders">Orders</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="/message">message</a>
              </li>
              <li class="nav-item" id="right" >
                <a class="nav-link "  href="{{ route('logout') }}"><span class="material-symbols-outlined">
                  logout
                  </span></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

    <div class="container mt-4">
        @yield("post")
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

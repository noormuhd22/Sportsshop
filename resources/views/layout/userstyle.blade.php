<!DOCTYPE html>
<html>
<head>
  <title>Sample Project</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
body {
  margin: 0;
  font-family: 'Poppins', sans-serif;

}
#cartCount{
  background-color: red;
  border-radius: 50%;
  height: 15px;
  width: 15px;
  padding: 4px;
  font-size: 13px;


}
ul.topnav {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  height: 100px;
  background-color: #007bff;
}

ul.topnav li {float: left;}

ul.topnav li a {
  margin-top: 10px;
  display: block;
  color: rgb(255, 255, 255);
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  transition: transform 0.3s ease;
}

.topnav img{
    border-radius:20px;
    height:50px;
    width:50px;
    
}
ul.topnav li a:hover:not(.active) {
  transform: translatey(-5px);
  color: #000000;
}


.dropdown-content {
  display: none;
  position: fixed;
  background-color:#007bff;
  min-width: 160px;
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;

}

.dropdown-content a:hover {
  background-color: #ddd;

}


.dropdown:hover .dropdown-content {
  opacity: 1;
  display: block;
}

ul.topnav li.right {
  margin-left: 25px;
  float: right;
}

#user{
  margin-top: 18px;
  display: block;
  color: rgb(255, 255, 255);
  text-align: center;
  padding: 8px 16px;
  text-decoration: none;
  transition: transform 0.3s ease;
  background-color: red;
  border-radius: 5px;
}

footer {
  background-color:#007bff;
            color: #fff;
            padding: 20px 0;
            text-align: center;
            margin-top: 80px;
        }
        footer p {
            margin-bottom: 10px;
        }
        footer a {
            color: #fff;
            text-decoration: none;
        }

@media screen and (max-width: 600px) {
  ul.topnav li.right, 
  ul.topnav li {float: none;}
}
</style>
</head>
<body>

<ul class="topnav">
  <li><a href="#"><img src="{{ asset('logo.ico') }}" alt="img">  </a></li>
  <li><a href="/home">Home</a></li>
  <li><a href="{{ route('categories') }}">Categories</a></li>
  <li><a href="{{ route('products') }}">Products</a></li>
  <li><a href="{{ route('contactus') }}">Contact us</a></li>
  <li><a href="{{ route('aboutus') }}">About Us</a></li>
 
  
  <li class="right"><a href="{{ route('cartview') }}"><span class="material-symbols-outlined">shopping_cart</span> <span id="cartCount"></span></a></li>
  <li class="right dropdown" id="settingsDropdown"> <!-- Added id to the dropdown content -->
    <a href="#" class="material-symbols-outlined" id="settingsBtn">settings</a> <!-- Added id to the settings link -->
    <div class="dropdown-content">
      <a href="{{ route('profile.view') }}">Profile</a>
      <a href="{{ route('user.orders') }}">Orders</a>
      <a href="{{ route('userlogout')}}">Logout</a>
    </div>
  </li>
  <li class="right" id="user"  >{{ session('user')['name'] }}</li>
</ul>

@yield("section")


  
<footer>
  <p>Contact us at +918137850467 or <a href="mailto:[Noormuhammed12345678@gmail.com]">Noormuhammed12345678@gmail.com</a>. Visit us at Street Address, City, State, Zip Code. Follow us on [Social Media Handle] for updates and promotions.</p>
  <p>&copy; 2024 Sports Shop . All rights reserved.</p>
</footer>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>




<script>

  // Initialize the dropdown menu
  function initializeDropdown() {
    var settingsBtn = document.getElementById("settingsBtn");
    var settingsDropdown = document.getElementById("settingsDropdown");

    settingsBtn.addEventListener("click", function() {
      settingsDropdown.classList.toggle("open");
    });
  }

  initializeDropdown(); 
  // Call updateCartCount function when the page loads
  $(document).ready(function() {
    updateCartCount();
  });
</script>


<!-- Add this script in your layout.userstyle blade -->
<script>

function updateCartCount() {
    fetch("{{ route('cart.count') }}")
        .then(response => response.json())
        .then(data => {
            console.log(data); // Log the response data to the console
            $('#cartCount').text(data.count);
        })
        .catch(error => console.error('Error:', error));
}


</script>




</body>
</html>
